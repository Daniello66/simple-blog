<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

#[Fillable(['user_id', 'category_id', 'title', 'content'])]
class Post extends Model
{
    /**
     * Relación de muchos a uno con users.
     *
     * @return BelongsTo
     * @author Daniel Beltrán
     */
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    /**
     * Relación de muchos a uno con categories.
     *
     * @return BelongsTo
     * @author Daniel Beltrán
     */
    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }

    /**
     * Relación de muchos a uno con comments.
     *
     * @return HasMany
     * @author Daniel Beltrán
     */
    public function comments(): HasMany {
        return $this->hasMany(Comment::class);
    }

    /**
     * Relación polimórfica de uno a muchos con reactions.
     *
     * @return MorphMany
     * @author Daniel Beltrán
     */
    public function reactions(): MorphMany {
        return $this->morphMany(Reaction::class, 'reactionable');
    }

    /**
     * Relación polimórfica de uno a muchos con files.
     *
     * @return MorphMany
     * @author Daniel Beltrán
     */
    public function files(): MorphMany {
        return $this->morphMany(File::class, 'fileable');
    }
}
