<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContatoController extends Controller
{
     public function index()
        {
            $titulo = 'Contato';
            return view('contato', compact('titulo'));
        }
}
