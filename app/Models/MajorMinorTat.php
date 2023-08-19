<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MajorMinorTat extends Model
{
    use HasFactory;

    protected  $table = 'major_minor_tat';

    // const CREATED_AT = 'created_at';

    // const UPDATED_AT = 'updated_at';

     public $timestamps = false; 


     public $guarded = [];
}
