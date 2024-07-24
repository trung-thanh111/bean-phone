<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCatalogue extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'id',
        'name',
        'image',
        'description',
        'publish',
    ];

    protected $table = 'product_catalogues';

    // khai báo quan hệ với bảng products 1-n
    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'product_catalogue_id', 'id');
    }
}
