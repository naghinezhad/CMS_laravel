<?php

namespace Modules\Admin\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Admin\Database\factories\TagFactory;

class Tag extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['name', 'slug'];
    
    protected static function newFactory(): TagFactory
    {
        //return TagFactory::new();
    }

    public function posts()
    {
        return $this->morphedByMany(Post::class, 'taggable');
    }
}
