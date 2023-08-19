<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\CreateComplaint;

class VehicleDetail extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'comp_vehicledetails';
//   protected $fillable = [
//         'veh_reg_no', 'verified_in_vahan', 'bs_nonbs', 'model', 'chassis_number', 'engine_no', 'driver_name', 'driver_contact_no',
//         'customer_contact', 'DL_validity_date', 'date_of_accident', 'driver_statement', 'location_of_the_accident',
//         'driving_license_number','ref_id'
//     ];
}
