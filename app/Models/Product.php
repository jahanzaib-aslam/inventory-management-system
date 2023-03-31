<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'has_variant',
        'is_active',
        'image',
        'description',
        'product_type_id',
        'purchase_type_id'
    ];

    public function productType(){
        return $this->belongsTo(ProductType::class, 'product_type_id', 'id');
    }

    public function purchaseType(){
        return $this->belongsTo(PurchaseType::class, 'purchase_type_id', 'id');
    }
}
