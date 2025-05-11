<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;



class Admin extends Authenticatable implements JWTSubject
{
    /** @use HasFactory<\Database\Factories\AdminFactory> */
    use HasFactory , notifiable;
    protected $table = 'admins';
    protected $fillable = [
        'name',
        'email',
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
        return $this->hasMany(Order::class);
    }
    public function users(){
        return $this->hasMany(User::class);
    }
    public function drivers(){
        return $this->hasMany(Driver::class);
    }
    public function histories(){
        return $this->hasMany(History::class);
    }









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
