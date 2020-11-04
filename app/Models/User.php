<?php

namespace App\Models;

use App\Jobs\SendResetPasswordEmail;
use App\Jobs\SendVerificationEmail;
use Cmgmyr\Messenger\Traits\Messagable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Cog\Contracts\Ban\Bannable as BannableContract;
use Cog\Laravel\Ban\Traits\Bannable;
use Storage;

class User extends Authenticatable implements MustVerifyEmail, BannableContract
{
    use HasFactory, Notifiable, Bannable, Messagable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'created_at',
        'updated_at',
        'state'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification(){
        SendVerificationEmail::dispatch($this);
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        SendResetPasswordEmail::dispatch($this, $token);
    }

    /**
     * Checks whete the user has access to the app
     */
    public function isAllowed(){
        return $this->state;
    }

    /**
     * Profile photo getter
     */
    public function getProfilePhotoAttribute(){
        return $this->profile_photo_url ? Storage::url($this->profile_photo_url) : asset('img/user.png');
    }
}
