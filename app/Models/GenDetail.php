<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\CreateComplaint;



class GenDetail extends Model
{
    use HasFactory;
    public $timestamps=false;

    protected $table='comp_gendetails';
    protected $fillable = ['accident_charge_name_dealer'];
}
