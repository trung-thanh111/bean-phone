<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostCatalogue extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'id',
        'name',
        'image',
        'description',
        'order',
        'publish',
    ];

    protected $table = 'post_catalogues';

   

    protected static function booted()
    {
        static::creating(function ($postCatalogue) {
            $maxOrder = PostCatalogue::max('order');
            $postCatalogue->order = $maxOrder ? $maxOrder + 1 : 1;
        });

        // static::updating(function ($postCatalogue) {
        //     if ($postCatalogue->isDirty('order')) {
        //         $newOrder = $postCatalogue->order;
        //         $oldOrder = $postCatalogue->getOriginal('order');
        //         $existingPost = PostCatalogue::where('order', $newOrder)->first();

        //         if ($existingPost && $existingPost->id != $postCatalogue->id) {
        //             $existingPost->order = $oldOrder;
        //             $existingPost->save();
        //         }
        //     }
        // });
    }
     // khai báo quan hệ với bảng products 1-n
     public function posts():HasMany{
        return $this->hasMany(Post::class, 'post_catalogue_id', 'id');
    }
    
}
