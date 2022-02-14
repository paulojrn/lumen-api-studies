<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Autenticador
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
        try {
            if (!$request->hasHeader('Authorization')) {
                throw new Exception("Sem o cabeçalho para autorização");
            }
    
            $authHeader = $request->header('Authorization');
            $token = str_replace("Bearer ", "", $authHeader);
            $dadosAuth = JWT::decode($token, new Key(env("JWT_KEY"), "HS256"));
    
            // return new GenericUser(["email" => $dadosAuth]);
            $user = User::where('email', $dadosAuth->email)->first();
            
            if (is_null($user)) {
                throw new Exception("Usuário não existente");
            }
    
            return $next($request);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 401);
        }        
    }
}
