<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SobreController extends Controller
{
     public function index()
        {
            $titulo = 'Sobre Nós';
            return view('sobre', compact('titulo'));
        }
}
