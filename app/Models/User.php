<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    protected $table = 'users';


    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'phone',
        'password',
    ];

    public function orders(){
        return $this->morphMany(Order::class, 'orderable');
    }

    public function histories(){
        return $this->morphMany(History::class, 'historyable');
    }


//
//    public function orders(){
//        return $this->hasMany(Order::class);
//    }
//    public function histories(){
//        return $this->hasMany(History::class);
//    }
//    public function admin(){
//        return $this->belongsTo(Admin::class);
//    }
}
