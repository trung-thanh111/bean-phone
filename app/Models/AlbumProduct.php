<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class AlbumProduct extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'album_products';

    protected $fillable = [
        'id',
        'albums',
        'publish',
        'product_id',
        'description',
    ];

    public function product():BelongsTo{
        return $this->belongsTo(Product::class, 'product_id','id');
    }
}
