<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {

        /*
            
            Cada vez que el usuario se salga de la sesión se actualice el campo last_auth,
            Para que en los próximos logueos se calcule cuanto tiempo lleva sin loguearse y determinar 
            si la última sesión del usuario fue hace más de un día lo redirija a una página llamada /sesiones
        */
        if( !empty(Auth::user()) ){
            $user = User::find(Auth::user()->id);
            if($user->id > 0){
                $user->last_auth = date('Y-m-d H:i:s');
                $user->save();
            }
        }

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
