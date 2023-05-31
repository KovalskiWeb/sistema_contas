@extends('admin.layouts.default')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="/contas" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="operation">Operação:</label>
                        <select class="form-control" name="operation" id="operation" required>
                            <option value="entrada">Entrada</option>
                            <option value="saida">Saída</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="account_id">Conta:</label>
                        <select class="form-control" name="account_id" id="account_id" required>
                            @if (count($accounts) > 0)
                                @foreach ($accounts as $account)
                                    <option value="{{ $account->id }}">{{ $account->name }}</option>
                                @endforeach
                            @else
                                <option value="">Dados não cadastrados!</option>
                            @endif

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="valor">Valor:</label>
                        <input type="text" class="form-control" name="valor" id="valor" required
                            data-mask="#.##0,00" data-mask-reverse="true">
                    </div>

                    <div class="form-group">
                        <label for="descricao">Descrição:</label>
                        <textarea class="form-control" name="descricao" id="descricao" rows="3" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
