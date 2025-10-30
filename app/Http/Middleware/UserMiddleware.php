<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth; // <-- ADICIONE ESTA LINHA

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        /*// 2. Verifique se o usuário NÃO está logado
        if(!Auth::check()){
            // 3. Se não estiver, redirecione para a rota de login
            return redirect()->route('loginForm');
        }
// 4. Se ele ESTIVER logado, deixe a requisição continuar*/
        return $next($request);
    }
}
