<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\CreateComplaint;

class Post_Approval_Delay_Analysis extends Model
{
    use HasFactory;
    public $timestamps=false;

    protected $table='comp_post_approval_delays';


    protected $guarded = [];
}
