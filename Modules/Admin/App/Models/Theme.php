<?php

namespace Modules\Admin\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Admin\Database\factories\ThemeFactory;

class Theme extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $table = 'themes';
    protected $fillable = ['name', 'slug', 'size', 'file', 'images'];

    public function isActive()
    {
        return $this->active;
    }

    protected static function newFactory(): ThemeFactory
    {
        //return ThemeFactory::new();
    }
}
