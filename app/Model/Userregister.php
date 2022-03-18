<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\Userregister as Authenticatable;

class Userregister extends Model implements AuthenticatableContract
{
    use  AuthenticatableContract ,Notifiable;

 
   
    protected $collection = 'Userregister';
 
  

    public $table = "user_register";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'f_name', 'l_name' , 'phone', 'email', 'password' ,'resetpassword',
    ];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    /**
     * Add a mutator to ensure hashed passwords
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }



}

