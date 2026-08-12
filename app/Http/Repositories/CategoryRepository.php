<?php

namespace App\Http\Repositories;

use App\Models\Category;

class CategoryRepository extends Repository
{
    /**
     * Constructor.
     *
     * @param Category $model Modelo de categorías.
     * @return void
     * @author Daniel Beltrán
     */
    public function __construct(Category $model) {
        parent::__construct($model);
    }
}
