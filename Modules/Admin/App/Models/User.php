<?php

namespace Modules\Admin\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Admin\Database\factories\UserFactory;

class User extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'level',
        'family',
        'mobile',
    ];

    protected static function newFactory(): UserFactory
    {
        //return UserFactory::new();
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
