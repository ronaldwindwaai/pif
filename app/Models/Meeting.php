<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;

    protected $fillable =   [
        'title',
        'starting_date',
        'end_date',
        'venue',
        'description',
        'file',
    ];

    private $columns = [
        'title',
        'starting_date',
        'end_date',
        'venue',
    ];

    public function get_columns()
    {
        return $this->columns;
    }

    public function programme()
    {
        return $this->belongsTo(Programme::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function recordings()
    {
        return $this->hasMany(Recording::class);
    }

    public function resources()
    {
        return $this->belongsToMany(Resource::class);
    }
}
