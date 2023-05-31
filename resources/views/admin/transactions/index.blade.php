@extends('admin.layouts.default')

@section('title', 'Contas')

@section('content')
    <div class="container">
        <h1 class="mt-4">Listagem de Transações</h1>

        <a href="{{ route('admin.transaction.create') }}" class="btn btn-success my-2">Cadastrar Lançamento</a>

        <form action="{{ route('admin.transaction.search') }}" method="GET">
            @csrf

            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="operation">Tipo:</label>
                    <select class="form-control" name="operation" id="operation">
                        <option value="all">Todos</option>
                        <option value="entrada">Entrada</option>
                        <option value="saida">Saída</option>
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="date">Data:</label>
                    <input type="date" class="form-control" name="date" id="date">
                </div>

                <div class="col-md-4 mb-3 d-flex align-items-end">
                    <button class="btn btn-primary" type="submit">Filtrar</button>
                </div>
            </div>
        </form>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (Session::has('error'))
            <div class="alert alert-danger">
                {{ Session::get('error') }}
            </div>
        @endif

        @if (count($transactions) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Conta</th>
                        <th>Tipo</th>
                        <th>Valor</th>
                        <th>Descrição</th>
                        <th>Data</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $transaction)
                        <tr>
                            <td>{{ $transaction->account['name'] }}</td>
                            <td class="{{ $transaction->operation == 'entrada' ? 'text-success' : 'text-danger' }}">{{ $transaction->operation }}</td>
                            <td>R$ {{ number_format($transaction->price, 2, ',', '.') }}</td>
                            <td>{{ $transaction->description }}</td>
                            <td>{{ $transaction->created_at->format('d/m/Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Não há dados disponíveis.</p>
        @endif
    </div>
@endsection
