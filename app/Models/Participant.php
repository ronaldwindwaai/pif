<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Participant extends Model
{
    use HasFactory;

    protected $table = 'participants';

    protected $fillable =   [
        'first_name',
        'last_name',
        'email',
        'registration_date',
        'country_code',
        'country',
        'tel',
        'organization',
        'job_title',
        'meeting_id',
    ];

    private $columns = [
        'name_of_the_meeting',
        'full_name',
        'registration_date',
        'country',
        'organization',
    ];

    public function get_columns()
    {
        return $this->columns;
    }

    public function meeting()
    {
        return $this->belongsTo(Meeting::class);
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }

    public function getRegistrationDateAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s.u', $value);
    }

}
