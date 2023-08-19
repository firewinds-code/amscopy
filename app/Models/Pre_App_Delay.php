<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\CreateComplaint;

class Pre_App_Delay extends Model
{
    use HasFactory;
    public $timestamps=false;

    protected $table='comp_pre_app_delays';
    
    protected $guarded = [];
}
