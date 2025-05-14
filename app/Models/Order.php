<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;




class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory , Notifiable ,softDeletes;
    protected $table = 'orders';
    protected $fillable = [
        'name',
        'description',
        'price',
        'height',
        'width',
        'type',
        'status',
        'admin_id',
        'driver_id',
        'user_id',
        'delivered_at',
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

    public function histories(){
        return  $this->hasMany(History::class);
    }

    protected static function booted(){
        static::updated(function($order){
            History::create([
                'status' => $order->status,
                'admin_id' => $order->admin_id,
                'driver_id' => $order->driver_id,
                'user_id' => $order->user_id,
                'order_id' => $order->id,
            ]);
        });
        static::created(function($order){
            History::create([
                'status' => $order->status,
                'admin_id' => $order->admin_id,
                'driver_id' => $order->driver_id,
                'user_id' => $order->user_id,
                'order_id' => $order->id,
            ]);
        });
    }


}
