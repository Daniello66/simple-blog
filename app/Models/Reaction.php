<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['reactionable_type', 'reactionable_id', 'user_id'])]
class Reaction extends Model
{
    /**
     * Relación polimórfica de muchos a uno.
     *
     * @return MorphTo
     * @author Daniel Beltrán
     */
    public function reactionable(): MorphTo {
        return $this->morphTo();
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
}
