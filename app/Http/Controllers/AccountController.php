<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAccount;
use App\Repositories\AccountRepository;
use App\Services\AccountService;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

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
        try {
            $accounts = $this->accountRepository->index();
            return view('admin.accounts.index', compact('accounts'));
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }

    public function create()
    {
        return view('admin.accounts.storeUpdate');
    }

    public function edit($id)
    {
        try {
            $account = $this->accountRepository->edit($id);
            if ($account) {
                return view('admin.accounts.storeUpdate', compact('account'));
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
            Session::flash('error', 'Ocorreu um erro.');

            return redirect()->back();
        }
    }

    public function update($id, Request $request)
    {
        try {
            $account = $this->accountRepository->update($id, $request->all());
            if ($account) {
                return redirect()->route('admin.account.edit', ['id' => $account->id])->with('success', 'Atualizado com sucesso!');
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
            Session::flash('error', 'Ocorreu um erro.');

            return redirect()->back();
        }
    }

    public function store(StoreAccount $request)
    {
        try {
            $account = $this->accountService->store($request);
            if ($account) {
                return redirect()->route('admin.accounts.index')->with('success', 'Cadastro realizado com sucesso!');
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
            Session::flash('error', 'Ocorreu um erro.');

            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try {
            $account = $this->accountRepository->destroy($id);
            if ($account) {
                return redirect()->route('admin.accounts.index')->with('success', 'Conta deletada com sucesso!');
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
            Session::flash('error', 'Ocorreu um erro.');

            return redirect()->back();
        }
    }
}
