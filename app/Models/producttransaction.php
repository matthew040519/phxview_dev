<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producttransaction extends Model
{
    use HasFactory;

    protected $table = 'producttransaction';
    protected $fillable = ['transaction_id', 'user_id', 'product_id', 'category_id', 'qty', 'price', 'size', 'tdate'];

    public function users()
    {
        return $this->belongsTo(users::class, 'user_id', 'id');
    }

    public function products()
    {
        return $this->BelongsTo(products::class, 'product_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(category::class, 'category_id', 'id');
    }

}
