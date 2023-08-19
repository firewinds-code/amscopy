<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Updateticket extends Model
{
    use HasFactory;
    protected $fillable = [

        'ticket_num',
        'reg_no',
        'chasi_no',
        'eng_no',
        'ticket_type',
        'vin_no',
        'status',
        'msv_type',
        'msv_reg_no',
        'mechinic_name',
        'mechinic_number',
        'dealer_name',
        'remark',
        'start_time',
        'response_time_No',
        'restore_time_No',
        'pause_time_No',
        'end_time',
        'url',
        'vehicle_mode'
    ];

}
