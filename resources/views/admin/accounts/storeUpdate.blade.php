@extends('admin.layouts.default')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">

                <form action="{{ route('admin.account.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="name">Nome:</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" required>
                    </div>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="balance">Saldo:</label>
                        <input type="text" class="form-control mask-price" name="balance" id="balance">
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
