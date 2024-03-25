<?php

namespace Modules\Admin\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Admin\Database\factories\CategoryFactory;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['name', 'slug', 'parent_id'];
    
    protected static function newFactory(): CategoryFactory
    {
        //return CategoryFactory::new();
    }

    public function posts()
    {
        return $this->morphedByMany(Post::class, 'catable');
    }

    public function subcategories()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
