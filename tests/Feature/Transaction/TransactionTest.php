<?php

namespace Tests\Feature\Transaction;

use App\Models\Account;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TransactionTest extends TestCase
{
    public function test_unauthenticated_transactions()
    {
        $response = $this->get('/admin/transactions');

        $response->assertStatus(302)
            ->assertRedirect('/admin/login');
    }

    public function test_get_all_transactions()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get('/admin/transactions');

        $response->assertStatus(200);
    }

    public function test_transaction()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get('/admin/transaction');

        $response->assertStatus(200);
    }
}
