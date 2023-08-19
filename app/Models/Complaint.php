<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\CreateComplaint;
class Complaint extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $table ='complaint';
}
