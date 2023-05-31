<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransaction;
use App\Repositories\AccountRepository;
use App\Repositories\TransactionRepository;
use App\Services\TransactionService;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class TransactionController extends Controller
{
    protected $transactionRepository, $accountRepository, $transactionService;

    public function __construct(TransactionRepository $transactionRepository, AccountRepository $accountRepository, TransactionService $transactionService)
    {
        $this->transactionRepository = $transactionRepository;
        $this->accountRepository = $accountRepository;
        $this->transactionService = $transactionService;
    }

    public function index()
    {
        try {
            $transactions = $this->transactionRepository->index();

            return view('admin.transactions.index', compact('transactions'));
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
            $transaction = $this->transactionService->store($request);
            if ($transaction) {
                return redirect()->route('admin.transactions.index')->with('success', 'Cadastro realizado com sucesso!');
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
            Session::flash('error', 'Ocorreu um erro.');

            return redirect()->back();
        }
    }

    public function search(Request $request)
    {
        try {
            $transactions = $this->transactionRepository->search($request->all());
            if ($transactions) {
                return view('admin.transactions.index', compact('transactions'));
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
            Session::flash('error', 'Ocorreu um erro.');

            return redirect()->back();
        }
    }
}
