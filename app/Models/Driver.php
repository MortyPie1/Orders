<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;


class Driver extends Authenticatable implements JWTSubject
{
    /** @use HasFactory<\Database\Factories\DriverFactory> */
    use HasFactory , notifiable;
    protected $table = 'drivers';
    protected $fillable = [
        'name',
        'email',
        'vehicle_number',
        'password',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    //relations

    public function orders(){
        return $this->morphMany(Order::class, 'orderable');
    }

    public function histories(){
        return $this->morphMany(History::class, 'historyable');
    }



//    public function orders(){
//        return $this->hasMany(Order::class);
//    }
//    public function users(){
//        return $this->hasMany(User::class);
//    }
//    public function histories(){
//        return $this->hasMany(History::class);
//    }
//    public function admin(){
//        return $this->belongsTo(Admin::class);
//    }









    //JWT auth func



    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
