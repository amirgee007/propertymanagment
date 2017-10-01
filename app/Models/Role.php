<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    protected $fillable = ['name'];

    const SUPER_ADMIN = 'Super Admin';
    const ADMIN = 'Admin';
    const MANAGER = 'Manager';
    const STAFF = 'Staff';
    const OWNER = 'Owner';

    public function scopeRole($query, $role_name)
    {
        return $role_name ? $query->where('name', $role_name) : $query;
    }

    public static function getRoleID($role_name)
    {
        return self::role($role_name)->first()->id;
    }
}
