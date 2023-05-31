<div class="container">
    <nav class="sidebar">
        <h4>Sistema de Contas</h4>
        <div class="nav d-flex">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">Home</a>
            <a class="nav-link" href="{{ route('admin.accounts.index') }}">Contas</a>
            <a class="nav-link" href="{{ route('admin.transactions.index') }}">Transações</a>
            <div class="ml-auto">
                <a class="nav-link logout-link" href="{{ route('admin.logout') }}">Deslogar</a>
            </div>
        </div>
    </nav>
</div>
