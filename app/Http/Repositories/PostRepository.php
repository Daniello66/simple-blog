<?php

namespace App\Http\Repositories;

use App\Models\Post;
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
}
