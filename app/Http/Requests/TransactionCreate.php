<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionCreate extends FormRequest
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
            "total_price" => "required",
            "total_paid" => "required",
            "payment_method_id" => "required",
            "voucher_id" => "nullable",
            "details" => "required",
            "notes" => "nullable"
        ];
    }
}
