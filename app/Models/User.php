<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Database\Factories\UserFactory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

#[Fillable(['name', 'surname', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Castear atributos.
     *
     * @return array
     * @author Daniel Beltrán
     */
    protected function casts(): array {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed'
        ];
    }

    /**
     * Agregar datos predefinidos a las consultas.
     *
     * @return array
     * @author Daniel Beltrán
     */
    protected function appends(): array {
        return [
            'fullname'
        ];
    }

    /**
     * Gestionar el atributo password.
     *
     * @return Attribute
     * @author Daniel Beltrán
     */
    public function password(): Attribute {
        return Attribute::make(
            set: fn (string $value) => Hash::make($value)
        );
    }

    /**
     * Gestionar el atributo fullname.
     *
     * @return Attribute
     * @author Daniel Beltrán
     */
    public function fullname(): Attribute {
        return Attribute::make(
            get: fn () => $this->name . ' ' . $this->surname
        );
    }

    /**
     * Relación de uno a muchos con posts.
     *
     * @return HasMany
     * @author Daniel Beltrán
     */
    public function posts(): HasMany {
        return $this->hasMany(Post::class);
    }

    /**
     * Relación de uno a muchos con comments.
     *
     * @return HasMany
     * @author Daniel Beltrán
     */
    public function comments(): HasMany {
        return $this->hasMany(Comment::class);
    }

    /**
     * Relación de uno a muchos con reactions.
     *
     * @return HasMany
     * @author Daniel Beltrán
     */
    public function reactions(): HasMany {
        return $this->hasMany(Reaction::class);
    }
}
