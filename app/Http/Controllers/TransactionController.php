<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransaction;
use App\Repositories\AccountRepository;
use App\Repositories\TransactionRepository;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;

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
        try {
            return view('admin.transactions.index');
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }

    public function create()
    {
        try {
            $accounts = $this->accountRepository->index();

            return view('admin.transactions.storeUpdate', compact('accounts'));
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }

    public function store(StoreTransaction $request)
    {
        try {
            $transaction = $this->transactionRepository->store($request->validated());
            if ($transaction) {
                return redirect()->route('admin.transactions')->with('success', 'Cadastro realizado com sucesso!');
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
