<?php

namespace App\Repositories;

use App\Models\ApiLog;
use Exception;
use App\Models\Notification;
use Illuminate\Support\Facades\DB;

class NotificationRepository
{
    const WAITINGPAYMENT = 1, PAID = 2, ONGOING = 3, FINISH = 4, CANCEL = 5;

    protected $firebase, $notifications, $apiLog;

    public function __construct(
        Notification $notifications,
        ApiLog $apiLog
    ) {
        $this->apiLog = $apiLog;
        $this->notifications = $notifications;
        $this->firebase = app()->make('repo.api.firebase');
    }

    public function listNotification($request)
    {
        return $this->notifications->all();
    }

    public function fromMidtrans($request)
    {
        $this->apiLog->create([
            'ip_address' => $request->ip(),
            'url' => $request->fullUrl(),
            'request_headers' => json_encode($request->header()),
            'request_method' => $request->method(),
            'request_body' => json_encode($request->input())
        ]);

        try {
            DB::beginTransaction();
            $transaction = $this->transaction->where(['transaction_code' => $request->order_id])->first();
            $transaction_status = $request->transaction_status;
            $type = $request->payment_type;
            $order_id = $request->order_id;
            $fraud = $request->fraud_status;

            if ($transaction_status == 'capture') {
                // For credit card transaction, we need to check whether transaction is challenge by FDS or not
                if ($type == 'credit_card') {
                    if ($fraud == 'challenge') {
                        // TODO set payment status in merchant's database to 'Challenge by FDS'
                        // TODO merchant should decide whether this transaction is authorized or not in MAP
                    } else {
                        // TODO set payment status in merchant's database to 'Success'
                        $transaction->transaction_status_id = self::ONGOING;
                    }
                }
            } else if ($transaction_status == 'settlement') {
                // TODO set payment status in merchant's database to 'Settlement'
                $transaction->transaction_status_id = self::ONGOING;
            } else if ($transaction_status == 'pending') {
                // TODO set payment status in merchant's database to 'Pending'
                $transaction->transaction_status_id = self::WAITINGPAYMENT;
            } else if ($transaction_status == 'deny') {
                // TODO set payment status in merchant's database to 'Denied'
                $transaction->transaction_status_id = self::CANCEL;
            } else if ($transaction_status == 'expire') {
                // TODO set payment status in merchant's database to 'expire'
                $transaction->transaction_status_id = self::CANCEL;
            } else if ($transaction_status == 'cancel') {
                // TODO set payment status in merchant's database to 'Denied'
                $transaction->transaction_status_id = self::CANCEL;
            }
            $transaction->save();
            DB::commit();
            $transaction = $this->transaction->where(['transaction_code' => $request->order_id])->first();

            return response()->json(['message' => 'Success receive notification', 'data' => compact('transaction')], 200);
        } catch (\Exception $e) {
            DB::rollback();
            throw new Exception($e->getMessage());
        }
    }
}
