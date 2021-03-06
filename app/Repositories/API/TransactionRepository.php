<?php

namespace App\Repositories\API;

use stdClass;
use Exception;
use App\Mail\OrderMail;
use App\Models\Schedule;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Services\Midtrans\CreateSnapUrlService;

class TransactionRepository
{
    //  1	Waiting Payment
    //  2	Paid
    //  3	Ongoing
    //  4	Finish
    //  5	Canceled

    const WAITINGPAYMENT = 1, PAID = 2, ONGOING = 3, FINISH = 4, CANCEL = 5;

    protected $schedule;
    protected $transaction;

    public function __construct(
        Transaction $transaction,
        Schedule $schedule
    ) {
        $this->transaction = $transaction;
        $this->schedule = $schedule;
    }

    public function index($request)
    {
        $request->per_page = $request->per_page ?? 10;
        $transactions = $this->transaction->paginate($request->per_page)->getCollection();
        return response()->json([
            'message' => 'List transactions',
            'data' => compact('transactions')
        ], 200);
    }

    public function show($id)
    {
        $transaction = $this->transaction->find($id);
        return response()->json([
            'message' => ' Detail transaction',
            'data' => compact('transaction')
        ], 200);
    }

    public function store($request)
    {
        try {
            DB::beginTransaction();
            $transaction_code = 'TRANS/' . str_pad(getLastTransactionId() + 1, 8, '0', STR_PAD_LEFT) . '/' . date('d/M/Y');
            $request->merge([
                'user_id' => auth('api')->user()->id,
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
                Mail::to($schedule->user->email)->send(new OrderMail($transaction, 'Order Mail'));
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

            Mail::to(auth('api')->user()->email)->send(new OrderMail($transaction));
            DB::commit();
            return response()->json(['message' => 'Transaction created', 'data' => compact('transaction', 'snap_url')], 201);
        } catch (\Exception $e) {
            DB::rollback();
            throw new Exception($e->getMessage());
        }
    }

    public function upload_invoice($request, $id)
    {
        try {
            DB::beginTransaction();
            $transaction = $this->transaction->find($id);
            if ($request->hasFile('invoice')) {
                $fileName = Str::slug($transaction->id . ' ' . $transaction->name . ' ' . Str::random(10));
                $data = substr($request->invoice, strpos($request->invoice, ',') + 1);
                $data = base64_decode($data);
                $path = Storage::disk('public_assets')->put('/invoice/' . $fileName . '.png', $data);
                $transaction->image()->delete();
                $transaction->image()->create(['url' => $path]);
            }
            DB::commit();
            return response()->json(['message' => 'Invoice created'], 201);
        } catch (\Exception $e) {
            DB::rollback();
            throw new Exception($e->getMessage());
        }
    }

    public function history($request)
    {
        $request->per_page = $request->per_page ?? 10;
        $transactions = $this->transaction->where(['user_id' => auth('api')->user()->id])
            ->with(['status', 'details' => function ($query) {
                $query->with(['schedule' => function ($query) {
                    $query->with(['user' => function ($query) {
                        $query->with(['detail']);
                    }]);
                }]);
            }])
            ->paginate($request->per_page)->getCollection();
        return response()->json([
            'message' => 'List transactions',
            'data' => compact('transactions')
        ], 200);
    }

    public function historyPartner($request)
    {
        $request->per_page = $request->per_page ?? 10;
        $transaction_id = $this->schedule->has('transactionDetail')->pluck('transaction_id');
        $transactions = $this->transaction->whereIn('id', $transaction_id)
            ->with(['status', 'details' => function ($query) {
                $query->with(['schedule' => function ($query) {
                    $query->with(['user' => function ($query) {
                        $query->with(['detail']);
                    }]);
                }]);
            }])
            ->paginate($request->per_page)->getCollection();
        return response()->json([
            'message' => 'List transactions',
            'data' => compact('transactions')
        ], 200);
    }

    public function partnerCancel($request, $id)
    {
        try {
            $transaction = $this->transaction->find($id);
            $transaction->transaction_status_id = self::CANCEL;
            $transaction->notes = $request->notes ?? '';
            $transaction->save();
            $transaction = $this->transaction->find($id);
            return response()->json([
                'message' => 'Transaction Updated',
                'data' => compact('transaction')
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], getCode($e->getCode()));
        }
    }

    public function partnerAccept($request, $id)
    {
        try {
            $transaction = $this->transaction->find($id);
            $transaction->transaction_status_id = self::ONGOING;
            $transaction->notes = $request->notes ?? '';
            $transaction->save();
            $transaction = $this->transaction->find($id);
            return response()->json([
                'message' => 'Transaction Updated',
                'data' => compact('transaction')
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], getCode($e->getCode()));
        }
    }

    public function partnerFinish($request, $id)
    {
        try {
            $transaction = $this->transaction->find($id);
            $transaction->transaction_status_id = self::FINISH;
            $transaction->notes = $request->notes ?? '';
            $transaction->save();
            $transaction = $this->transaction->find($id);
            return response()->json([
                'message' => 'Transaction Updated',
                'data' => compact('transaction')
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], getCode($e->getCode()));
        }
    }
}
