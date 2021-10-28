<?php

namespace App\Repositories;

use App\Models\Schedule;
use Exception;
use App\Models\Transaction;
use App\Models\TransactionStatus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\Console\Output\ConsoleOutput;

class TransactionRepository
{
    protected $console;
    protected $schedule;
    protected $transaction;
    protected $transactionStatus;
    protected $firebase;
    protected $partners;

    public function __construct(
        Transaction $transaction,
        TransactionStatus $transactionStatus,
        Schedule $schedule
    ) {
        $this->transaction = $transaction;
        $this->transactionStatus = $transactionStatus;
        $this->schedule = $schedule;
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
        $title = 'Transactions';
        $transactionsPage = 'active';
        $transaction = $this->transaction->find($id);
        $transactionStatus = $this->transactionStatus->all();
        return view('pages.transactions.show', compact('transactionsPage', 'transaction', 'transactionStatus', 'title'));
    }

    public function store($request)
    {
        try {
            DB::beginTransaction();
            $request->merge([
                'user_id' => auth()->user()->id,
                'transaction_status_id' => 1,
                'details' => json_decode($request->details)
            ]);
            $transaction = $this->transaction->create($request->input());
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
            DB::commit();
            return redirect()->route('user.event.booking', ['id' => auth()->user()->id])->with('success', 'Order Success');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }

    public function edit($id)
    {
        $title = 'Transactions';
        $transactionsPage = 'active';
        $transaction = $this->transaction->find($id);
        $transactionStatus = $this->transactionStatus->all();
        return view('pages.transactions.edit', compact('transactionsPage', 'transaction', 'transactionStatus', 'title'));
    }

    public function update($request, $id)
    {
        try {
            DB::beginTransaction();
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
            // $transaction->detail()->update();
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
