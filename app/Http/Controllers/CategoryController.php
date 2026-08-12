<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    /**
     * Constructor.
     *
     * @param CategoryRepository $repository Repositorio de categorías.
     * @return void
     * @author Daniel Beltrán
     */
    public function __construct(private CategoryRepository $repository) {}

    /**
     * Cargar la página principal de categorías.
     *
     * @param Request $request Contenido de la petición.
     * @return View
     * @author Daniel Beltrán
     */
    public function index(Request $request): View {
        return view('categories.index')->with([
            'categories' => $this->repository->getAll($request)
        ]);
    }
}
