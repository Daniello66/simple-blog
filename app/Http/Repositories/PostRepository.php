<?php

namespace App\Http\Repositories;

use Override;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Repositories\Repository;

class PostRepository extends Repository
{
    /**
     * Constructor.
     *
     * @param Post $model Modelo de posts.
     * @return void
     * @author Daniel Beltrán
     */
    public function __construct(Post $model) {
        parent::__construct($model);
    }

    /**
     * Obtener todos los posts.
     *
     * @param Request $request Contenido de la petición.
     * @return Collection
     * @author Daniel Beltrán
     */
    #[Override]
    public function getAll(Request $request): Collection {
        return $this->model->with([
            'user:id,name,surname',
            'category:id,name'
        ])
        ->orderBy('created_at', 'desc')
        ->get();
    }
}
