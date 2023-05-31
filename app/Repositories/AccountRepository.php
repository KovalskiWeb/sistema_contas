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
        return $this->entity->create($data);
    }

    public function edit(string $id)
    {
        return $this->entity->findOrFail($id);
    }

    public function update(string $id, array $request)
    {
        $account = $this->entity->find($id);
        $account->name = $request['name'];
        $account->save();

        return $account;
    }

    public function destroy(string $id)
    {
        return $this->entity->find($id)->delete();
    }
}