<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'officer_id',
        'programme_id',
        'objective',
        'file',
    ];

    private $columns = [
        'title',
        'officer',
        'programme',
        'created_at',
    ];

    public function get_columns()
    {
        return $this->columns;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function programme()
    {
        return $this->belongsTo(Programme::class);
    }

    public function meetings()
    {
        return $this->hasMany(Meeting::class);
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }
}
