<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    use HasFactory;

    protected $table = 'tasks';
    protected $fillable = ['task_name', 'client_id', 'url', 'user_id', 'date_created', 'task_rate'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function client()
    {
        return $this->belongsTo(client::class, 'client_id', 'id');
    }
}
