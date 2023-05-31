<?php

namespace App\Services;

use App\Repositories\TransactionRepository;

class TransactionService
{
    protected $repository;

    public function __construct(TransactionRepository $transactionRepository)
    {
        $this->repository = $transactionRepository;
    }

    public function store($request)
    {
        $data = $request->all();
        $data['price'] = number_format((float) str_replace(',', '.', str_replace('.', '', $data['price'])), 2, '.', '');

        return $this->repository->store($data);
    }
}