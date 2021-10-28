<?php

namespace App\Repositories\API;

use App\Models\Schedule;
use Exception;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TransactionRepository
{
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
            $request->merge(['user_id' => auth('api')->user()->id]);
            $transaction = $this->transaction->create($request->input());
            foreach ($request->details as $detail) {
                $data = [
                    'transaction_id' => $transaction->id,
                    'schedule_id' => $detail['schedule_id'],
                    'total_price' => $detail['total_price'],
                    'total_paid' => $detail['total_paid'],
                    'total_paid' => $detail['total_paid']
                ];
                $transaction->details()->create($data);
                $this->schedule->where(['id' => $detail['schedule_id']])->update([
                    'is_available' => 1,
                    'is_booked' => 1,
                ]);
            }
            DB::commit();
            return response()->json(['message' => 'Transaction created', 'data' => compact('transaction')], 201);
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
}
