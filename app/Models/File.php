<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['fileable_type', 'fileable_id', 'disk', 'name'])]
#[Hidden(['created_at', 'updated_at'])]
class File extends Model
{
    /**
     * Relación polimórfica de muchos a uno.
     *
     * @return MorphTo
     * @author Daniel Beltrán
     */
    public function fileable(): MorphTo {
        return $this->morphTo();
    }
}
