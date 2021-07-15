<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'manager_id',
        'description',
    ];

    private $columns = [
        'id',
        'title',
        'manager',
        'created_at',
    ];

    public function get_columns()
    {
        return $this->columns;
    }


    public function meetings()
    {
        return $this->hasMany(Meeting::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }
}
