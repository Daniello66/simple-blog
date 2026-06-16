<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['name'])]
#[Hidden(['created_at', 'updated_at'])]
class Category extends Model
{
    /**
     * Relación de uno a muchos con posts.
     *
     * @return HasMany
     * @author Daniel Beltrán
     */
    public function posts(): HasMany {
        return $this->hasMany(Post::class);
    }
}
