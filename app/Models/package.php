<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class package extends Model
{
    use HasFactory;

    protected $table = 'packages';
    protected $fillable = ['package_name', 'dc_token', 'click', 'dr', 'color'];

    public function member_package()
    {
        return $this->hasMany(member_package::class, 'package_id', 'id');
    }
}
