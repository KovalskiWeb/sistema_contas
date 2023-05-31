<?php

namespace App\Services;

use App\Repositories\AccountRepository;

class AccountService
{
    protected $repository;

    public function __construct(AccountRepository $accountRepository)
    {
        $this->repository = $accountRepository;
    }

    public function store($request)
    {
        $data = $request->all();
        $data['balance'] = number_format((float) str_replace(',', '.', str_replace('.', '', $data['balance'])), 2, '.', '');

        return $this->repository->store($data);
    }
}