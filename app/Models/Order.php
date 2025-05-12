<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory , Notifiable;
    protected $table = 'orders';
    protected $fillable = [
        'order_type',
        'order_status',
        'order_date',

    ];
    public function orderable()
    {
        return $this->morphTo();
    }
}
