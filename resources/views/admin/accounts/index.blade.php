@extends('admin.layouts.default')

@section('title', 'Contas')

@section('content')
    <div class="container">
        <h1 class="mt-4">Listagem de Contas</h1>

        <a href="{{ route('admin.account.create') }}" class="btn btn-success my-2">Cadastrar Conta</a>

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
                                <a href="{{ route('admin.account.edit', ['id' => $account->id]) }}"
                                    class="btn btn-primary btn-sm">
                                    <i class="fa fa-edit"></i> Editar
                                </a>
                                <a href="#" class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#confirmDeleteModal" data-account-id="{{ $account->id }}">
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

    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmação de exclusão</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="deleteAccountMessage"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <form id="deleteAccountForm" action="" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    @parent

    <script>
        $('#confirmDeleteModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var accountName = button.closest('tr').find('td:first').text();
            var accountId = button.data('account-id');
            var deleteUrl = '{{ route('admin.account.destroy', ':id') }}';
            deleteUrl = deleteUrl.replace(':id', accountId);
            $('#deleteAccountForm').attr('action', deleteUrl);
            $('#deleteAccountMessage').html('Tem certeza de que deseja excluir a conta <strong>"' + accountName + '"</strong>?');
        });
    </script>
@endsection
