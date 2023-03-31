<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseType extends Model
{
    use HasFactory;

    protected $table = 'purchase_type';

    protected $fillable = [
        'name'
    ];
}