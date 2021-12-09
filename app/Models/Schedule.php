<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'start_date',
        'end_date',
        'is_available',
        'is_booked',
    ];

    protected $appends = [
        'time_start',
        'time_end',
        'date',
    ];

    /**
     * Get the user that owns the Schedule
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getDateAttribute()
    {
        $date = date_create($this->start_date);
        return date_format($date, "Y-m-d");
    }

    public function getTimeStartAttribute()
    {
        $date = date_create($this->start_date);
        return date_format($date, "H:i");
    }

    public function getTimeEndAttribute()
    {
        $date = date_create($this->end_date);
        return date_format($date, "H:i");
    }

    /**
     * Get the user that owns the Schedule
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transactionDetail()
    {
        return $this->belongsTo(TransactionDetail::class, 'schedule_id', 'id');
    }
}
