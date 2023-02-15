<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

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

    public function index(Request $request): View
    {
        return view('auth.two-factor-code');
    }

    public function compare(Request $request)
    {
        if( is_numeric($request->code_twofactor) && !empty(Auth::user()) ){

            $user = User::find( Auth::user()->id );

            if( isset($user->id) ){
                // dd($user->code_twofactor.' == '.$request->code_twofactor);
                if( $user->code_twofactor == $request->code_twofactor ){
                    $user->date_twofactor = date('Y-m-d H:i:s');
                    $user->save();
                    return back()->with('status', 'two-factor-code-success');
                }
            }
        }

        return back()->with('status', 'two-factor-code-warning');
    }
}
