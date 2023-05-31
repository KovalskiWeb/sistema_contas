<?php

namespace App\Repositories;

use App\Models\Account;
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
        return $this->entity->with('account')->orderByDesc('id')->get();
    }

    public function store(array $data)
    {
        $account = Account::findOrFail($data['account_id']);
        if ($account) {
            $account->balance = ($data['operation'] == 'entrada' ? $account->balance + $data['price'] : $account->balance - $data['price']);
            $account->save();

            $transaction = $this->entity->create([
                'account_id' => $data['account_id'],
                'operation' => $data['operation'],
                'price' => $data['price'],
                'description' => $data['description'],
            ]);
        }

        return $transaction;
    }

    public function search($request)
    {
        $operation = $request['operation'];
        $data = $request['date'];

        return $this->entity
            ->when($operation !== 'all', function ($query) use ($operation) {
                return $query->where('operation', $operation);
            })
            ->when($data ?? false, function ($query) use ($data) {
                return $query->whereDate('created_at', $data);
            })
            ->with('account')
            ->orderByDesc('id')
            ->get();
    }
}
