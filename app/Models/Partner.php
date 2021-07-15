<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable =   [
        'title',
        'contact_person',
        'contact_details',
    ];

    private $columns = [
        'title',
        'contact_person',
        'created_at',
    ];

    public function get_columns()
    {
        return $this->columns;
    }

}
