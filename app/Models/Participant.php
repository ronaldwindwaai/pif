<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $fillable =   [
        'first_name',
        'last_name',
        'email',
        'registration_date',
        'country_code',
        'country',
        'phone',
        'organization',
        'job_title',
        'meeting_id',
        'file',
        'file',
    ];

    private $columns = [
        'full_name',
        'registration_date',
        'country_code',
        'organization',
    ];


    public function meeting()
    {
        return $this->belongsTo(Meeting::class);
    }
}
