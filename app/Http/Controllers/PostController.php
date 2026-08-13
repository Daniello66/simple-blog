<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Repositories\PostRepository;
use App\Http\Repositories\CategoryRepository;

class PostController extends Controller
{
    /**
     * Constructor.
     *
     * @param PostRepository $repository Repositorio de posts.
     * @param CategoryRepository $category_repository Repositorio de categorías.
     * @return void
     * @author Daniel Beltrán
     */
    public function __construct(
        private PostRepository $repository,
        private CategoryRepository $category_repository
    ) {}

    /**
     * Cargar la página principal de posts.
     *
     * @param Request $request Contenido de la petición.
     * @return View
     * @author Daniel Beltrán
     */
    public function index(Request $request): View {
        return view('posts.index')->with([
            'posts'      => $this->repository->getAll($request),
            'categories' => $this->category_repository->getAll(new Request())
        ]);
    }

    /**
     * Cargar la página de detalle del post.
     *
     * @param int $id ID del post.
     * @return View
     * @author Daniel Beltrán
     */
    public function show(int $id): View {
        return view('posts.show')->with([
            'post' => $this->repository->getOne($id)
        ]);
    }

    /**
     * Cargar la página de creación.
     *
     * @return View
     * @author Daniel Beltrán
     */
    public function create(): View {
        return view('posts.create')->with([
            'categories' => $this->category_repository->getAll(new Request())
        ]);
    }
}

// TODO: Pensar en como manejar las inyecciones, sobre todo cuando se necesita lógica, ya que no existen servicios, una opción sería utilizar la función app() para no tener que hacer inyecciones de ningún tipo
