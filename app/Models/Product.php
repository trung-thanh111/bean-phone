<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id',
        'title',
        'image',
        'short_desc',
        'description',
        'color',
        'gift',
        'hot',
        'price',
        'del',
        'product_catalogue_id',
        'brand_id',
        'rate',
        'sold',
        'feedback',
        'accessory',
        'publish',
    ];

    protected $table = 'products';

    //định nghĩa nghịch đảo 
    public function ProductCatalogue(): BelongsTo
    {
        return $this->belongsTo(ProductCatalogue::class, 'product_catalogue_id', 'id');
    }
    //
    public function brands():BelongsTo{
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }
    //
    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }
    public function comment():HasMany
    {
        return $this->hasMany(Comment::class, 'product_id','id');
    }
    public function albumProduct():HasMany{
        return $this->hasMany(AlbumProduct::class, 'product_id','id');
    }
}
