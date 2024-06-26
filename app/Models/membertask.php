<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class membertask extends Model
{
    use HasFactory;

    protected $table = 'membertasks';
    protected $fillable = ['member_id', 'batch', 'task_id', 'tdate', 'count'];
}
