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
    <div class="container">
        <div class="row">
            <h1>Home - Dashboard</h1>
        </div>
    </div>
@endsection

@section('footer')
    <div class="container">
        <div class="row">
            Footer
        </div>
    </div>
@endsection
