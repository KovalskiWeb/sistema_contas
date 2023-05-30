@extends('admin.layouts.default')

@section('title', 'Login')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center">Tela de Login</h2>

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('login.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name=email placeholder="Digite seu email">
                    </div>
                    <div class="form-group">
                        <label for="password">Senha:</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Digite sua senha">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Entrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
