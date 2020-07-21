<?php

namespace App\Http\Controllers;
use App\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntrarController extends Controller
{
    public function index(){
        return view("entrar.index");
    }

    public function entrar(Request $request)
    {
        //Attempt - tenta realizar o login com Laravel
        if (!Auth::attempt($request->only(['email', 'password']))) {
            return redirect()
                ->back()
                ->withErrors('Usuário e/ou senha incorretos');
        }

        return redirect()->route('listar_series');

    }
}
