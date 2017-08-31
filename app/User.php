<?php

namespace App;

use App\Models\Owner;
use App\Models\Role;
use function foo\func;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','user_id','role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function owner()
    {
        return $this->hasOne(Owner::class, 'user_id', 'id');
    }
    public function role(){
        return $this->belongsTo(Role::class, 'role_id','id');
    }
    public function HasRole($role)
    {
       if(@$this->role->name == $role){
           return true;
       }else{
           return false;
       }
    }
}
