<?php

namespace App\Repositories;

use App\Models\Account;

class AccountRepository
{
    protected $entity;

    public function __construct(Account $model)
    {
        $this->entity = $model;
    }

    public function index()
    {
        return $this->entity->orderByDesc('id')->get();
    }

    public function store(array $data)
    {
        $account = $this->entity->create($data);

        return $account;
    }
}