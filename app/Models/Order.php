<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id',
        'description',
        'date_buy',
        'payment_method',
        'user_id',
        'total',
        'status',
        'created_at',
        'updated_at',
    ];

    protected $table = 'orders';

    // //định nghĩa nghịch đảo 
    // public function products_catalogues():BelongsTo{
    //     return $this->belongsTo(ProductCatalogue::class, 'product_catalogue_id', 'id');
    // }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function users():BelongsTo{
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
}
