<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class duplicate_job_card extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = 'duplicate_job_card';

    protected $guarded = [];
}
