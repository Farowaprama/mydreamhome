<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInformation extends Model
{
    use HasFactory;

    protected $fillable = [

        'user_id', 'designation', 'present_address', 'permanent_address', 'date_of_birth', 'gender', 'house_name', 'location', 'holding_no', 'nid_image', 'profile_image', 'logo', 'sign_image'

    ];
}
