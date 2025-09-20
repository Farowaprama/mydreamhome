<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RenterPayBill extends Model
{
    use HasFactory;

    protected $fillable = [

        'renter_id', 'created_by', 'flat_id', 'house_rent_pay', 'gas_bill_pay', 'water_bill_pay', 'garbage_bill_pay', 'service_charge_pay', 'total_pay', 'due_bill', 'month', 'pay_year', 'note'

    ];


}
