<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'programme_title',
        'project_title',
        'activity_name',
        'date_from',
        'date_to',
        'venue',
        'objective',
        'file',
    ];

    protected $casts = [
        'date_from' => 'datetime:Y-m-d',
        'date_to' => 'datetime:Y-m-d',
    ];

    public function get_table_columns()
    {
        return DB::getSchemaBuilder()->getColumnListing($this->getTable());
    }

    public function resources()
    {
        return $this->belongsToMany(Resource::class);
    }


}
