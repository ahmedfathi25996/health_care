<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\AdminMessages;
use Illuminate\Notifications\Notifiable;
class User extends Authenticatable
{
        use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone_number',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function messages()
{
  return $this->hasMany(AdminMessages::class);
}

public function feedbacks()
{
    return $this->hasMany('App\Feedback');
}
public function scopeActive($query,$api_token)
    {
       
       return $query->where('api_token',$api_token)->first();
        
    }

    public function city()
    {
        return $this->belongsTo('App\City','city_id');
    }
}
