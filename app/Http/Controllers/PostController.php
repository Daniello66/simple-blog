<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Repositories\PostRepository;

class PostController extends Controller
{
    /**
     * Constructir
     *
     * @param PostRepository $repository Repositorio de posts.
     * @return void
     * @author Daniel Beltrán
     */
    public function __construct(private PostRepository $repository) {}

    /**
     * Cargar la página principal de posts.
     *
     * @return View
     * @author Daniel Beltrán
     */
    public function index(Request $request): View {
        return view('posts.index')->with([
            'posts' => $this->repository->getAll($request)
        ]);
    }
}
