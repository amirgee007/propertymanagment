<?php

namespace App;

use App\Models\Owner;
use App\Models\Role;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'is_verify',
        'userRole'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $appends = ['label_status', 'label_role'];

    public function owner()
    {
        return $this->hasOne(Owner::class, 'user_id', 'id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    public function HasRole($role)
    {
        if (@$this->role->name == $role) {
            return true;
        } else {
            return false;
        }
    }

    public function getLabelStatusAttribute()
    {
        if ($this->is_verify == true)
            return '<span class="label label-success">Active</span>';
        else
            return '<span class="label label-danger">InActive</span>';
    }

    public function getLabelRoleAttribute()
    {
        if ($this->role)
            return '<span class="label label-primary">'.$this->role->name.'</span>';
        else
            return '<span class="label label-danger">No Role</span>';
    }


    public static function createOwnerUser(Request $request)
    {
        $data = [
            'name' => $request->has('owner_name') ? $request->owner_name : 'Nill',
            'email' => $request->email,
            'password' => bcrypt('password'),
            'is_verify' => 1,
            'role_id' => Role::getRoleID(Role::OWNER) // ToDo: Giving Owner Role
        ];

        $user = self::create($data);

        return $user;
    }
}
