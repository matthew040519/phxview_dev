<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class memberincome extends Model
{
    use HasFactory;

    protected $table = 'memberincomes';
    protected $fillable = ['member_id', 'batch', 'tdate', 'income'];
}
