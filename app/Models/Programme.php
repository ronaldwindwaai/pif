<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
    ];

    private $columns = [
        'id',
        'title',
        'added_by',
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
}
