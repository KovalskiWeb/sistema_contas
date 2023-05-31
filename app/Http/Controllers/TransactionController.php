<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransaction;
use App\Repositories\AccountRepository;
use App\Repositories\TransactionRepository;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    protected $transactionRepository, $accountRepository;

    public function __construct(TransactionRepository $transactionRepository, AccountRepository $accountRepository)
    {
        $this->transactionRepository = $transactionRepository;
        $this->accountRepository = $accountRepository;
    }

    public function index()
    {
        return view('admin.transactions.index');
    }

    public function show()
    {
        $accounts = $this->accountRepository->index();

        return view('admin.transactions.storeUpdate', compact('accounts'));
    }

    public function store(StoreTransaction $request)
    {
        $transaction = $this->transactionRepository->store($request->validated());
        if($transaction) {
            return redirect()->route('admin.transactions')->with('success', 'Cadastro realizado com sucesso!');
        }
    }
}
