<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        //echo($request->input()['password']);
        return redirect()->route("home")->with([
            "mensaje" => "Loggueado",
        ]);
    }
}
