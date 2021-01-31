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
        'date_from' => 'datetime:d-m-Y',
        'date_to' => 'datetime:d-m-Y',
    ];

    public $columns = [
        'programme_title',
        'project_title',
        'date_from',
        'date_to',
        'venue',
    ];

    public function get_table_columns()
    {
        return DB::getSchemaBuilder()->getColumnListing($this->getTable());
    }

    public function getTableColumns()
    {
        return Schema::getColumnListing($this->getTable());
    }

    public function filter($columns)
    {
        $only_columns = Arr::where($columns, function ($value, $key) {

            return $value === 'programme_title' || $value === 'project_title'
            || $value === 'activity_name' || $value === 'date_from' || $value === 'date_to' || $value === 'venue';
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function resources()
    {
        return $this->belongsToMany(Resource::class);
    }

    public function meetings()
    {
        return $this->hasMany(Meeting::class);
    }


}
