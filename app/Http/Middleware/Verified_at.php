<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

// use Illuminate\View\View;
use App\Models\User;

class Verified_at
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if( Auth::user()->is_twofactor === 1 ){
            $user = User::find( Auth::user()->id );
            if( isset($user->id) ){

                if( date('Y-m-d H:i:s', strtotime(Auth::user()->date_twofactor.'+30 minute')) < date('Y-m-d H:i:s') ){
                    $user->code_twofactor = $this->generateTwofactor();
                    $user->date_twofactor = date('Y-m-d H:i:s');
                    $user->save();
                    return redirect('view_twofactor');
                }

            }
        }

        return ( !empty(Auth::user()->email_verified_at) ? $next($request) : redirect('verificacion') );

    }

    public function generateTwofactor(): Int
    {
        // Numero de 6 digitos
        $code = '';
        while( strlen($code) < 6 ){
            $nextnumber = rand(0,9);
            $code .= $nextnumber;
        }
        return (int) $code;
    }

}
