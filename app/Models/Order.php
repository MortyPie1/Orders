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
        'order_name',
        'type',
        'status',
        'admin_id',
        'driver_id',
        'user_id',
        'delivery_date'
    ];

    public function admin(){
       return $this->belongsTo(Admin::class);
    }

    public function driver(){
        return  $this->belongsTo(Driver::class);
    }

    public function user(){
        return  $this->belongsTo(User::class);
    }

}
