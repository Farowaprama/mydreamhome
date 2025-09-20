<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblSetBill extends Model
{
    use HasFactory;


    protected $fillable = [

        'renter_id', 'created_by', 'flat_no', 'house_rent', 'gas_bill', 'water_bill', 'garbage_bill', 'service_charge', 'e_meter_no', 'total_bill'

    ];
}
