<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if(Auth::attempt(['email'=> $request->email,'password'=> $request->password])){
            return redirect()->route('pages.home')->with('success','Usuario logado com sucesso!');
        }
        return redirect()->back()->with('danger','Não foi possível fazer o login. E-mail ou senha inválidas!');
    }

}
