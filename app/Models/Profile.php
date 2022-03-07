<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;

class Profile extends Authenticatable implements MustVerifyEmail
{
    protected $table = "profiles";
    use HasFactory;
    use Notifiable;
    protected $guarded =[];
    protected $fillable = [
        'name',
        'dob',
        'nickname',
        'username_login',
        'email',
        'description',
        'avatar',
        'address',
        'phone',
        'password',
        'role_id'
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

    // /**
    //  * The attributes that should be cast.
    //  *
    //  * @var array<string, string>
    //  */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];
    public function username()
    {
        return 'username_login';
    }
    public function getProfiles()
    {
        return $this->belongsTo('App\Models\Profile');
    }
}
