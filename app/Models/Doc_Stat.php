<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\CreateComplaint;

class Doc_Stat extends Model
{
    use HasFactory;

    public $timestamps=false;

    protected $table='comp_doc_stats';

    protected $guarded = [];
}
