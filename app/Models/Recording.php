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
        'meeting_name',
        'added_by',
    ];

    public function get_columns()
    {
        return $this->columns;
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function meetings()
    {
        return $this->belongsTo(Meeting::class);
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }
}
