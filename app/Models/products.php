<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = ['category_id', 'products_name', 'price', 'details', 'image', 'active'];

    public function category()
    {
        return $this->belongsTo(category::class, 'category_id', 'id');
    }
}
