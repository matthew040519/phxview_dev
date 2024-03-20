<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class conversion extends Model
{
    use HasFactory;

    protected $table = 'conversion';
    protected $fillable = ['member_id', 'withdraw', 'conversion', 'type', 'transfer', 'date'];
}
