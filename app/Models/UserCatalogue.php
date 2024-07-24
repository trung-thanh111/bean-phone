<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserCatalogue extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'id',
        'name',
        'image',
        'description',
        'publish',
    ];

    protected $table = 'user_catalogues';

    // khai báo quan hệ với bảng users 1-n
    public function users():HasMany{
        return $this->hasMany(User::class, 'user_catalogue_id', 'id');
    }
}
