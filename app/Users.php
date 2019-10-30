<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'mobile_number',
        'password',
        'first_name',
        'middle_name',
        'last_name',
        'birth_date',
        'type',
        'sex',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'confirmation',
    ];

    public function full_name()
    {
        if($this->middle_name !== null && $this->middle_name !== '') {
            return $this->first_name . ' ' . substr($this->middle_name, 0, 1) . '. ' . $this->last_name;
        } else {
            return $this->first_name . ' ' . $this->last_name;
        }
    }

    public function skills()
    {
        return $this->hasMany('App\Skillsets', 'user_id', 'id');
    }

    public function swipes()
    {
        return $this->hasMany('App\Swipes', 'swiper_id', 'id');
    }

    public function swipe_by()
    {
        return $this->hasMany('App\Swipes', 'target_user_id', 'id');
    }
}
