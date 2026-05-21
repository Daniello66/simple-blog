<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

#[Fillable(['post_id', 'user_id', 'content'])]
class Comment extends Model
{
    /**
     * Relación de muchos a uno con posts.
     *
     * @return BelongsTo
     * @author Daniel Beltrán
     */
    public function post(): BelongsTo {
        return $this->belongsTo(Post::class);
    }

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
     * Relación polimórfica de uno a muchos con reactions.
     *
     * @return MorphMany
     * @author Daniel Beltrán
     */
    public function reactions(): MorphMany {
        return $this->morphMany(Reaction::class, 'reactionable');
    }
}
