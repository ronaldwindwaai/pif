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
        'created_date',
    ];

    public function get_columns()
    {
        return $this->columns;
    }


    public function meetings()
    {
        return $this->hasMany(Meeting::class);
    }
}
