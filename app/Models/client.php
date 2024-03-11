<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    use HasFactory;

    protected $table = 'clients';
    protected $fillable = ['user_id', 'client_name', 'client_address', 'date_join'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
