<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'comments';

    protected $fillable = [
        'id',
        'content',
        'rating',
        'user_id',
        'product_id',
        'publish',
        'created_at',
    ];

    public function user():BelongsTo{
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function product():BelongsTo{
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    public function post():BelongsTo{
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }
}
