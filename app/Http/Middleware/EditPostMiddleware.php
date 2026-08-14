<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Repositories\PostRepository;
use Symfony\Component\HttpFoundation\Response;

class EditPostMiddleware
{
    /**
     * Manejar la petición.
     *
     * @param Request $request Contenido de la petición.
     * @param Closure $next Siguiente petición.
     * @return Response
     * @author Daniel Beltrán
     */
    public function handle(Request $request, Closure $next): Response {
        $post = app(PostRepository::class)->getOne($request->route('post'));

        if (Auth::id() === $post->user_id) {
            return $next($request);
        }

        return abort(403, 'No tienes permiso para realizar esta acción');
    }
}
