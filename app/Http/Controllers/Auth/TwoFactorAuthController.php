<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

class TwoFactorAuthController extends Controller
{
    /**
     * Display the two factor
     */
    public function update(Request $request)//: RedirectResponse|View
    {

        if( is_numeric($request->twofactor) && !empty(Auth::user()) ){

            $user = User::find( Auth::user()->id );

            if( isset($user->id) ){

                $user->is_twofactor = $request->twofactor;
                $user->save();

                return back()->with('status', 'two-factor-success');

            }
        }

        return back()->with('status', 'two-factor-warning');

    }
}
