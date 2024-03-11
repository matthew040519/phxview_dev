<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tree extends Model
{
    use HasFactory;

    protected $table = 'trees';
    protected $fillable = ['upline', 'first', 'second', 'third', 'fourth', 'complete'];
}
