@extends('admin.layouts.default')

@section('title', 'Dashboard')

@section('estilos')
    <style>
        /* Estilos personalizados para o menu */
        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #f8f9fa;
            padding: 20px;
        }

        .sidebar a {
            display: block;
            margin-bottom: 10px;
        }

        .logout-link {
            position: absolute;
            top: 10px;
            right: 10px;
        }
    </style>
@endsection

@section('content')
    <div class="sidebar">
        <h4>Menu</h4>
        <a href="{{ route('admin.accounts') }}">Contas</a>
        <a href="#">Página 2</a>
        <a href="#">Página 3</a>
        <a href="#">Página 4</a>
        <a href="#">Página 5</a>
    </div>

    <a class="logout-link" href="{{ route('admin.logout') }}">Deslogar</a>
@endsection

@section('footer')
Footer
@endsection
