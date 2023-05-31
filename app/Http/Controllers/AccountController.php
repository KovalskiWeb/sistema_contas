<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAccount;
use App\Repositories\AccountRepository;
use Illuminate\Http\Request;

class AccountController extends Controller
{   
    protected $repository;

    public function __construct(AccountRepository $accountRepository)
    {
        $this->repository = $accountRepository;
    }

    public function index()
    {
        $accounts = $this->repository->index();
        return view('admin.accounts.index', compact('accounts'));
    }

    public function show()
    {
        return view('admin.accounts.storeUpdate');
    }

    public function store(StoreAccount $request)
    {
        $account = $this->repository->store($request->validated());
        if($account) {
            return redirect()->route('admin.accounts')->with('success', 'Cadastro realizado com sucesso!');
        }
    }
}
