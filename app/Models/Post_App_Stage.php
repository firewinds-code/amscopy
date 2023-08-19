<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\CreateComplaint;

class Post_App_Stage extends Model
{
    use HasFactory;
    public $timestamps=false;

    protected $table='comp_post_app_stages';

    protected $guarded = [];
}
