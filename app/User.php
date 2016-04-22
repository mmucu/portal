<?php

namespace churchapp;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['firstname', 'lastname', 'email', 'password','type'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function profile()
    {
        return $this->hasOne('\churchapp\Profile');
    }

    public function posts()
    {
        return $this->morphMany('\churchapp\Post','postable');
    }

    public function groups()
    {
        return $this->belongsToMany('\churchapp\Group')->withTimestamps();
    }
    public function getFirstnameAttribute($value){
        return ucfirst($value);
    }

    public function getLastnameAttribute($value){
        return ucfirst($value);
    }

    public function images()
    {
        return $this->morphMany('\churchapp\Image', 'imageable');
    }

}
