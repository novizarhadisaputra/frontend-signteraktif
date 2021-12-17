<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotificationMidtrans extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "transaction_time" => "required",
            "transaction_status" => "required",
            "transaction_id" => "required",
            "status_message" => "required",
            "status_code" => "required",
            "signature_key" => "required",
            "settlement_time" => "nullable",
            "payment_type" => "required",
            "order_id" => "required",
            "merchant_id" => "required",
            "gross_amount" => "required",
            "fraud_status" => "required",
            "currency" => "required"
        ];
    }
}
