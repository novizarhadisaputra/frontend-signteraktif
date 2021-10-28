<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function user()
    {
        return $this->belongsTo(User::class, 'role_id', 'id');
    }

    /**
     * Get all of the comments for the Role
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permissions', 'role_id', 'permission_id');
    }
}
