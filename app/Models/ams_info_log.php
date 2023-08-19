<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ams_info_log extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = 'ams_info_log';
    protected $guarded = [];
}


