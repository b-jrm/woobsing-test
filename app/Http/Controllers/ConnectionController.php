<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ConnectionController extends Controller
{
    public function render(Request $request): View
    {
        return view('sessions.index');
    }
}
