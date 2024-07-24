<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'description',
        'image',
        'birthday',
        'address',
        'province_id',
        'ward_id',
        'district_id',
        'phone',
        'user_catalogue_id',
        'publish',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function user_catalogues():BelongsTo{
        return $this->belongsTo(UserCatalogue::class, 'user_catalogue_id', 'id');
    }
    public function orders():HasMany
    {
        return $this->hasMany(Order::class, 'user_id','id');
    }
    
    public function comment():HasMany
    {
        return $this->hasMany(Comment::class, 'user_id','id');
    }
    
    
}
