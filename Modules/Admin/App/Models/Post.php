<?php

namespace Modules\Admin\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Admin\Database\factories\PostFactory;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'description',
        'body',
        'images',
        'view',
        'approved',
    ];

    protected static function newFactory(): PostFactory
    {
        //return PostFactory::new();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function path()
    {
        return '/posts/' . $this->slug;
    }

    public function isApproved()
    {
        return (bool) $this->approved;
    }

    public function categories()
    {
        return $this->morphToMany(Category::class, 'catable');
    }
}
