<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exceptions\CustomException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CreatePostRequest;
use App\Http\Repositories\PostRepository;
use App\Http\Repositories\CategoryRepository;
use Illuminate\Routing\Attributes\Controllers\Middleware;

#[Middleware('post.edit', only: ['edit'])]
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

    /**
     * Crear un post.
     *
     * @param CreatePostRequest $request Contenido de la petición.
     * @return RedirectResponse
     * @author Daniel Beltrán
     */
    public function store(CreatePostRequest $request): RedirectResponse {
        return $this->savePost($request, 'posts.index', 'posts.create');
    }

    /**
     * Cargar la página de edición.
     *
     * @param int $id ID del post.
     * @return View
     * @author Daniel Beltrán
     */
    public function edit(int $id): View {
        return $this->create()->with([
            'post' => $this->repository->getOne($id)
        ]);
    }

    /**
     * Editar un post.
     *
     * @param int $id ID del post.
     * @param CreatePostRequest $request Contenido de la petición.
     * @return RedirectResponse
     * @author Daniel Beltrán
     */
    public function update(int $id, CreatePostRequest $request): RedirectResponse {
        $request->merge(['id' => $id]);
        return $this->savePost($request, 'posts.index', 'posts.create');
    }

    /**
     * Guardar un post.
     *
     * @param Request $request Contenido de la petición.
     * @param string $redirect_success Nombre de la ruta a redirigir en caso de éxito.
     * @param string $redirect_error Nombre de la ruta a redirigir en caso de error.
     * @throws CustomException Cuando no hay una sesión activa.
     * @return RedirectResponse
     * @author Daniel Beltrán
     */
    public function savePost(Request $request, string $redirect_success, string $redirect_error): RedirectResponse {
        try {
            if (is_null(Auth::id())) {
                throw new CustomException('Debes iniciar sesión para realizar esta acción');
            }

            DB::beginTransaction();

            if ($request->filled('id')) {
                $this->repository->update($request->id, $request->except(['id']));
            } else {
                $request->merge(['user_id' => Auth::id()]);
                $this->repository->save($request->all());
            }

            DB::commit();

            return to_route($redirect_success)->with(['message' => 'El post fue guardado con éxito']);
        } catch (Exception $error) {
            DB::rollback();

            if ($error instanceof CustomException) {
                $message = $error->getMessage();
            } else {
                $message = 'Ocurrió un error al guardar el registro';
            }

            return to_route($redirect_error)->with(['error' => $message]);
        }
    }
}

// TODO: Pensar en como manejar las inyecciones, sobre todo cuando se necesita lógica, ya que no existen servicios, una opción sería utilizar la función app() para no tener que hacer inyecciones de ningún tipo
