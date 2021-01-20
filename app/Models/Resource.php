<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Resource extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
    ];

    public function get_table_columns()
    {
        return DB::getSchemaBuilder()->getColumnListing($this->getTable());
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
