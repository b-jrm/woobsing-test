<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): RedirectResponse
    {
        // Simulación de verificación de email, se actualiza en base de datos en vez de enviar correo

        if( !empty(Auth::user()) ){

            $user = User::find( Auth::user()->id );

            if( isset($user->id) ){
                $user->email_verified_at = date('Y-m-d H:i:s');
                $user->save();
                return back()->with('status', 'verification-link-success');
            }

        }

        return back()->with('status', 'verification-link-warning');
    }
}
