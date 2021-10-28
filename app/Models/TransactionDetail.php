<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'schedule_id',
        'total_price',
        'total_paid',
        'voucher_id'
    ];

    /**
     * Get the schedule associated with the TransactionDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function schedule()
    {
        return $this->hasOne(Schedule::class, 'id', 'schedule_id');
    }
}
