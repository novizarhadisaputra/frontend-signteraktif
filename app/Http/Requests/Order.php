<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Order extends FormRequest
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
            'user_id' => 'required',
            'total_price' => 'required',
            'payment_method_id' => 'required',
            'transaction_status_id' => 'required',
            'voucher_id' => 'nullable',
            'details' => 'required'
        ];
    }
}
