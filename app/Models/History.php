<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    /** @use HasFactory<\Database\Factories\HistoryFactory> */
    use HasFactory;
    protected $table = 'histories';
    protected $fillable = [
        'order_id',
        'date',
        'driver_id',
        'admin_id',
        'user_id',
        'order_status',


    ];
    public function admin()
    {
        return $this->belongsTo(User::class);
    }
    public function driver(){
        return $this->belongsTo(Driver::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }
}
