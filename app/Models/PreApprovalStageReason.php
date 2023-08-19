<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreApprovalStageReason extends Model
{
    use HasFactory;

    protected $table = 'pre_approval_delay_reason';

    public $timestamps = false;

    protected $guarded = [];
}
