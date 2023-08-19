<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\CreateComplaint;

class Repair_Delay extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table='comp_repair_delays';

    protected $guarded = [];
}
