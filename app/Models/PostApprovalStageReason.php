<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostApprovalStageReason extends Model
{
    use HasFactory;
    
    protected $table = 'post_approval_delay_reason';

    public $timestamps = false;

    protected $guarded = [];
}
