@extends('admin.layouts.default')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if (Session::has('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                @endif

                <form action="{{ route('admin.transaction.store') }}" method="POST">
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
                        <label for="price">Valor:</label>
                        <input type="text" class="form-control mask-price" name="price" id="price" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Descrição:</label>
                        <textarea class="form-control" name="description" id="description" rows="3" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent

    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.mask-price').mask('000.000.000,00', {
                reverse: true
            });
        });
    </script>
@endsection
