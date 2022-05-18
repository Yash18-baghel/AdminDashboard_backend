<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'admin_id',
        'quantity',
        'product_name',
        'brand_name',
    ];

    use HasFactory;
    public function Admin(){
        return $this->belongsTo(Admin::class);
    }
}
