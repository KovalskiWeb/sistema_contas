@extends('admin.layouts.default')

@section('title', 'Contas')

@section('content')
    <div class="container">
        <h1 class="mt-4">Listagem de Contas</h1>

        <a href="{{ route('admin.account') }}" class="btn btn-success my-2">Cadastrar Conta</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (count($accounts) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Conta</th>
                        <th>Saldo</th>
                        <th class="text-center">Data</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($accounts as $account)
                        <tr>
                            <td>{{ $account->name }}</td>
                            <td>R$ {{ number_format($account->balance, 2, ',', '.') }}</td>
                            <td class="text-center">{{ $account->created_at->format('d/m/Y') }}</td>
                            <td class="text-center">
                                <a href="#" class="btn btn-primary btn-sm">
                                    <i class="fa fa-edit"></i> Editar
                                </a>
                                <a href="#" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i> Excluir
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Não há dados disponíveis.</p>
        @endif
    </div>
@endsection
