<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id',
        'title',
        'image',
        'albums',
        'description',
        'content',
        'cre',
        'date_submit',
        'position',
        'post_catalogue_id',
        'user_id',
        'views',
        'likes',
        'publish',
    ];


    protected $table = 'posts';

    protected static function booted()
    {
        static::creating(function ($post) {
            $maxPosition = Post::max('position');
            $post->position = $maxPosition ? $maxPosition + 1 : 1;
        });

        // static::updating(function ($post) {
        //     if ($post->isDirty('order')) {
        //         $newOrder = $post->order;
        //         $oldOrder = $post->getOriginal('order');
        //         $existingPost = PostCatalogue::where('order', $newOrder)->first();

        //         if ($existingPost && $existingPost->id != $post->id) {
        //             $existingPost->order = $oldOrder;
        //             $existingPost->save();
        //         }
        //     }
        // });
    }

    //định nghĩa nghịch đảo 
    public function post_catalogues():BelongsTo{
        return $this->belongsTo(PostCatalogue::class, 'post_catalogue_id', 'id');
    }
    public function users():BelongsTo{
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function comment():HasMany
    {
        return $this->hasMany(Comment::class, 'post_id','id');
    }
}
