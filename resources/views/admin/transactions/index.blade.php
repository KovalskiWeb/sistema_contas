@extends('admin.layouts.default')

@section('title', 'Contas')

@section('content')
    <div class="container">
        <h1 class="mt-4">Listagem de Transações</h1>

        <a href="{{ route('admin.transaction.create') }}" class="btn btn-success my-2">Cadastrar Lançamento</a>

        <form action="/transacoes" method="GET">
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="tipo">Tipo:</label>
                    <select class="form-control" name="tipo" id="tipo">
                        <option value="">Todos</option>
                        <option value="entrada">Entrada</option>
                        <option value="saida">Saída</option>
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="data">Data:</label>
                    <input type="date" class="form-control" name="data" id="data">
                </div>

                <div class="col-md-4 mb-3 d-flex align-items-end">
                    <button class="btn btn-primary" type="submit">Filtrar</button>
                </div>
            </div>
        </form>

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
                <!-- Aqui você pode usar PHP ou outras linguagens para popular a tabela com os dados das transações -->
                <tr>
                    <td>Fulano</td>
                    <td>Entrada</td>
                    <td>R$ 100,00</td>
                    <td>Venda de produto</td>
                    <td>2023-05-30</td>
                </tr>
                <tr>
                    <td>Beltrano</td>
                    <td>Saída</td>
                    <td>R$ 50,00</td>
                    <td>Despesa de transporte</td>
                    <td>2023-05-29</td>
                </tr>
                <!-- ... -->
            </tbody>
        </table>
    </div>
@endsection
