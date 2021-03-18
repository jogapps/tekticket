<?php

namespace App\Model;

use App\Notifications\Organizer\Auth\ResetPasswordNotification;
use App\Traits\UUID;
use Illuminate\Notifications\Notifiable;
use App\Notifications\Organizer\Auth\EmailVerificationNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Organizer extends Authenticatable implements MustVerifyEmail, JWTSubject
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
        'password', 'remember_token',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new EmailVerificationNotification());
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function getImage()
    {
        return $this->profile_image ?? 'default.png';
    }

    public function getProfileImageAttribute($image)
    {
        $profileImage = $image ?? 'default.png';
        return asset('uploads/organizers/' . $profileImage);
    }

    public function getName()
    {
        return ucwords($this->name);
    }


    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function getAddress()
    {
        return ucwords($this->address . ', ' . $this->city . ', ' . $this->state);
    }
}
