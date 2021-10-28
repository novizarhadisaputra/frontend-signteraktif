<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_price',
        'transaction_status_id',
        'voucher_id',
        'payment_method_id',
        'notes'
    ];

    protected $appends = ['color_status'];

    /**
     * Get all of the comments for the Transaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function details()
    {
        return $this->hasMany(TransactionDetail::class, 'transaction_id', 'id');
    }

    /**
     * Get the status associated with the Transaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function status()
    {
        return $this->hasOne(TransactionStatus::class, 'id', 'transaction_status_id');
    }

    /**
     * Get the user associated with the Transaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function getColorStatusAttribute()
    {
        switch ($this->attributes['transaction_status_id']) {
            case '1':
                return 'info';
            case '2':
                return 'info';
            case '3':
                return 'warning';
            case '4':
                return 'success';
            case '5':
                return 'danger';
            default:
                return 'danger';
        }
    }
}
