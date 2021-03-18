<?php

namespace App\Model;

use App\Traits\UUID;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    use UUID;

    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'country'
    ];

    public function getNameAttribute($name)
    {
        return ucwords($name);
    }

    public function getProfileImageAttribute($image)
    {
        $profileImage = $image ?? 'default.png';
        return asset('uploads/users/' . $profileImage);
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function wallet()
    {
        return $this->hasOne(Wallet::class)->withDefault([
            'balance' => 0.00
        ]);
    }

    public function giftVoucher()
    {
        return $this->hasOne(GiftVoucher::class)->withDefault([
            'balance' => 0.00
        ]);
    }

    public function getLocation()
    {
        return ucwords($this->address . ', ' . $this->city . ', ' . $this->state);
    }

}
