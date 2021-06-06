<?php

namespace App\Http\Middleware;

use Closure;

class CheckIsAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //usando um middleware para garantir que somente alguns usuários poderão acessar um/ou mais features da aplicação:
        $user = auth()->user(); //pegando os dados do usuário autenticado

        //eu poderia passar um array de usuários que podem ou que não podem, através do in_array, como podemos ver abaixo:
        // if(in_array($user->email, ['dany@mail.com', 'outro@email.com', 'outroemail@mail.com'])) {

        if($user->email != 'dany@mail.com'){
            return redirect('/');
        }

        return $next($request);
    }
}
