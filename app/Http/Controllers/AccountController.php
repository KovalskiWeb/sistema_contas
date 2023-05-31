<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAccount;
use App\Repositories\AccountRepository;
use App\Services\AccountService;
use Illuminate\Http\Request;

class AccountController extends Controller
{   
    protected $accountRepository, $accountService;

    public function __construct(AccountRepository $accountRepository, AccountService $accountService)
    {
        $this->accountRepository = $accountRepository;
        $this->accountService = $accountService;
    }

    public function index()
    {
        $accounts = $this->accountRepository->index();
        return view('admin.accounts.index', compact('accounts'));
    }

    public function show()
    {
        return view('admin.accounts.storeUpdate');
    }

    public function store(StoreAccount $request)
    {
        $account = $this->accountService->store($request);
        if($account) {
            return redirect()->route('admin.accounts')->with('success', 'Cadastro realizado com sucesso!');
        }
    }
}
