<?php

namespace App\Repositories;

use App\Models\Transaction;

class TransactionRepository
{
    protected $entity;

    public function __construct(Transaction $model)
    {
        $this->entity = $model;
    }

    public function index()
    {
        return $this->entity->orderByDesc('id')->get();
    }

    public function store(array $data)
    {
        $transaction = $this->entity->create([
            'account_id' => $data['account']
        ]);

        return $transaction;
    }
}