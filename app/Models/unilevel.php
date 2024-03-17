<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class unilevel extends Model
{
    use HasFactory;

    protected $table = 'unilevels';
    protected $fillable = ['member_id', 'username', 'amount', 'tdate'];
}
