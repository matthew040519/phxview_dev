<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class member_package extends Model
{
    use HasFactory;

    protected $table = 'member_packages';
    protected $fillable = ['username', 'package_id', 'tdate'];

    public function package(): BelongsTo
    {
        return $this->belongsTo(package::class, 'package_id', 'id');
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(users::class, 'username', 'email');
    }

}
