<?php

namespace App\Repositories;

use stdClass;
use Exception;
use App\Mail\OrderMail;
use App\Models\Schedule;
use App\Models\Transaction;
use Illuminate\Support\Str;
use App\Models\TransactionStatus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Services\Midtrans\CreateSnapUrlService;
use Symfony\Component\Console\Output\ConsoleOutput;

class TransactionRepository
{
    protected $console;
    protected $schedule;
    protected $transaction;
    protected $transactionStatus;
    protected $firebase;
    protected $partners;
    protected $user;

    public function __construct(
        Transaction $transaction,
        TransactionStatus $transactionStatus,
        Schedule $schedule
    ) {
        $this->schedule = $schedule;
        $this->transaction = $transaction;
        $this->transactionStatus = $transactionStatus;
        // $this->user = app()->make('repo.users');
        $this->firebase = app()->make('repo.api.firebase');
        $this->partners = app()->make('repo.partners');
        $this->console = new ConsoleOutput();
    }

    public function listOrder($request)
    {
        return $this->transaction->all();
    }

    public function upcomingEvent($request)
    {
        return $this->transaction->where(['transaction_status_id' => 3])->get();
    }

    public function show($id)
    {
        $transaction = $this->transaction->find($id);
        $partner = $this->partners->find($transaction->details[0]->schedule->user->id);
        return view('transaction.detail', compact('transaction', 'partner'));
    }

    public function store($request)
    {
        try {
            DB::beginTransaction();
            $transaction_code = 'TRANS/' . str_pad(getLastTransactionId() + 1, 8, '0', STR_PAD_LEFT) . '/' . date('d/M/Y');
            $request->merge([
                'user_id' => auth()->user()->id,
                'transaction_status_id' => 1,
                'transaction_code' => $transaction_code
            ]);


            $order = new stdClass();
            $transaction = $this->transaction->create($request->input());
            $total_price = 0;

            $details = [];
            $customer_details = [
                'first_name' => auth()->user()->name,
                'email' => auth()->user()->email,
                'phone' => auth()->user()->detail->phone,
            ];

            $request->merge(['details' => json_decode($request->details)]);

            foreach ($request->details as $detail) {
                $data = [
                    'transaction_id' => $transaction->id,
                    'schedule_id' => $detail->schedule_id,
                    'total_price' => $detail->total_price,
                    'total_paid' => $detail->total_paid,
                    'total_paid' => $detail->total_paid
                ];

                $transaction->details()->create($data);

                $this->schedule->where(['id' => $detail->schedule_id])->update([
                    'is_available' => 0,
                ]);
                $total_price = $total_price + $detail->total_price == 0 ? 10000 : $detail->total_price;
                $schedule = $this->schedule->find($detail->schedule_id);
                $details[] = [
                    'id' => $detail->schedule_id, // primary key produk
                    'price' => $detail->total_price == 0 ? 10000 : $detail->total_price, // harga satuan produk
                    'quantity' => 1, // kuantitas pembelian
                    'name' => $schedule->user->name, // nama produk
                ];
                // Mail::to($schedule->user->email)->send(new OrderMail($transaction, 'Order Mail'));
            }

            $order->id = $transaction_code;
            $order->gross_amount = $total_price;
            $order->details = $details;
            $order->customer_details = $customer_details;

            if (is_null($transaction->snap_url)) {
                $snap_url = (new CreateSnapUrlService($order))->getSnapUrl();
                $transaction->snap_url = $snap_url;
            }

            $transaction->save();
            $transaction = $this->transaction->where(['transaction_code' => $transaction_code])->first();

            // Mail::to(auth()->user()->email)->send(new OrderMail($transaction));
            DB::commit();
            return redirect($snap_url);
            // return redirect()->route('user.event.booking', ['id' => auth()->user()->id])->with('success', 'Order Success');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }

    public function edit($id)
    {
        $title = 'Transactions';
        $transaction = $this->transaction->find($id);
        $partner = $this->partners->find($transaction->details[0]->schedule->user->id);
        return view('transaction.edit', compact('transaction', 'partner'));
    }

    public function update($request, $id)
    {
        try {
            DB::beginTransaction();
            $request->merge([
                'user_id' => auth()->user()->id,
                'transaction_status_id' => 1,
                'details' => json_decode($request->details)
            ]);
            $transaction = $this->transaction->find($id);

            if (!$transaction) abort(404);

            // if ($request->hasFile('payment_slip')) {
            //     if (isset($transaction->image->url)) {
            //         if (file_exists(asset($transaction->image->url))) {
            //             unlink(asset($transaction->image->url));
            //         }
            //     }
            //     $transaction->image()->delete();
            //     $fileName = Str::slug($transaction->id . ' ' . Str::random(10));
            //     $path = Storage::disk('public_assets')->putFileAs('photo', $request->file('payment_slip'), $fileName . '.png');
            //     $transaction->image()->create(['url' => $path]);
            // }
            $data = [
                'total_price' => $request->total_price ?? $transaction->total_price,
                'transaction_status_id' => $request->transaction_status_id ?? $transaction->transaction_status_id,
                'voucher_id' => $request->voucher_id ?? null,
                'payment_method_id' => $request->payment_method_id ?? $transaction->payment_method_id,
                'notes' => $request->notes ?? $transaction->notes
            ];
            $transaction->details()->delete();
            foreach ($request->details as $detail) {
                $data = [
                    'transaction_id' => $transaction->id,
                    'schedule_id' => $detail->schedule_id,
                    'total_price' => $detail->total_price,
                    'total_paid' => $detail->total_paid,
                    'total_paid' => $detail->total_paid
                ];
                $transaction->details()->create($data);
                $this->schedule->where(['id' => $detail->schedule_id])->update([
                    'is_available' => 0,
                ]);
            }
            // $transaction->detail()->update();
            Mail::to(auth()->user()->email)->send(new OrderMail($transaction));
            $transaction->update($data);
            DB::commit();
            return redirect()->back()->with('success', 'Updating success');
        } catch (\Exception $e) {
            DB::rollback();
            throw new Exception($e->getMessage());
        }
    }

    public function destroy($id)
    {
        $transaction = $this->transaction->find($id);
        $transaction->detail()->delete();
        $transaction->delete();
        return redirect()->back()->with('success', 'Deleting success');
    }

    public function transactionEmail($email)
    {
        return $this->transaction->where(['email' => $email])->first();
    }

    public function showFormOrder($request, $id)
    {
        $partner = $this->partners->find($id);
        $schedules = $this->partners->schedules($request, $id);
        return view('transaction.order', compact('schedules', 'partner'));
    }
}
