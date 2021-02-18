<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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

    private $columns = [
        'id',
        'name',
        'email',
        'created_at',
    ];

    public function get_columns()
    {
        return $this->columns;
    }
    public function programme()
    {
        return $this->hasMany(Programme::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function meetings()
    {
        return $this->hasMany(Meeting::class);
    }

    public function recordings()
    {
        return $this->hasMany(Recording::class);
    }

    public function resources()
    {
        return $this->hasMany(Resource::class);
    }

    public function file()
    {
        return $this->hasMany(File::class);
    }
}

