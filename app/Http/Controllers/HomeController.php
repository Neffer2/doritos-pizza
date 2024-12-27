<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function ranking(){
        $ranking = User::orderBy('puntos', 'desc')->get();

        $user_id = auth()->user()->id;
        $user_position = 0;
        $ranking->search(function($user) use ($user_id, &$user_position){
            $user_position++;
            return $user->id == $user_id;
        });

        return view('dashboard.ranking', [
            'ranking' => $ranking->take(5),
            'user_position' => $user_position
        ]);
    }

    public function registrarCodigo(){
        return view('dashboard.registro_codigos');
    }

    public function showRuleta(){
        return view('dashboard.ruleta');
    }
}
