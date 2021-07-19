<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'programme_officer_id',
        'description',
    ];

    private $columns = [
        'id',
        'title',
        'programme_officer',
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

    public function programme_officer()
    {
        return $this->belongsTo(User::class,'programme_officer_id','id');
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }
}
