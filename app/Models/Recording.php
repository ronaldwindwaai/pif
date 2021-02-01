<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recording extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'credentials',
        'url_recording',
    ];

    private $columns = [
        'id',
        'title',
        'url_recording',
    ];

    public function get_columns()
    {
        return $this->columns;
    }
}
