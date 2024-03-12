<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class directinvite extends Model
{
    use HasFactory;

    protected $table = 'directinvites';
    protected $fillable = ['sponsor', 'username', 'amount'];
}
