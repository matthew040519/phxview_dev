<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class member extends Model
{
    use HasFactory;

    protected $table = 'members';
    protected $fillable = ['username', 'first_name', 'middle_name', 'last_name', 'birthday', 'province_code', 
    'city_code', 'brgy_code', 'gender', 'contact_number', 'email', 'member_code', 'sponsor',
     'upline', 'position', 'tron_wallet_id', 'gcash'];
}
