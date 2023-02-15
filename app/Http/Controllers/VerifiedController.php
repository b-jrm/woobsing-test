<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VerifiedController extends Controller
{
    public function __construct(){
        $this->middleware('verified_at');
    }

    
}
