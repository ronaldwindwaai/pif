<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;

    protected $fillable =   [
        'title',
        'type_of_meeting',
        'date',
        'start_time',
        'end_time',
        'participants_arrival_date',
        'secretariat_arrival_date',
        'participants_departure_date',
        'secretariat_departure_date',
        'description',
        'is_breakout_room_required',
        'is_recording_required',
        'is_attendance_report_required',
        'is_members_airfare_required',
        'is_secretariat_airfare_required',
        'proposed_funding',
        'perdiem_rate',
        'num_of_participants',
        'venue',
        'status',
    ];

    private $columns = [
        'title',
        'meeting_dates',
        'project_name',
        'status',
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

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function recordings()
    {
        return $this->hasMany(Recording::class);
    }

    public function participants()
    {
        return $this->hasMany(Participant::class);
    }
    public function resources()
    {
        return $this->belongsToMany(Resource::class);
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }

    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = ucwords($value);
    }
}
