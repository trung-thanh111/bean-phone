<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use HasFactory, SoftDeletes;
    // cho phép các field 
    protected $fillable = [
        'id',
        'name',
        'image',
        'description',
        'publish',
    ];
    // khai báo bảng brands
    protected $table = 'brands';

    // khai báo quan hệ với bảng products 1-n
    public function products():HasMany{
        return $this->hasMany(Product::class, 'brand_id', 'id');
    }
}
