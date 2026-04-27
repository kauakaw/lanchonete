@extends('layouts.app')

@section('title', 'Início')

@section('content')

    <div class="p-5 mb-4 bg-white rounded-3 shadow-sm">
        
        <div class="container-fluid py-5">
            
            <h1 class="display-5 fw-bold">{{ $titulo }}</h1>
            
            <p class="col-md-8 fs-5">
                <form method='POST'>
                <h2> Nome: <input type=text name=nome><br>
                <h2> E-mail: <input type=text name=email><br>
                <h2> Mensagem: <input type=text name=msg><br>
                <input type=submit value='OK' name=OK> </form>
            </p>
            #Ver Cardápio</a>
        </div>
    </div>

@endsection