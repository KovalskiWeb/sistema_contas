<?php

namespace Tests\Feature\Account;

use App\Models\Account;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AccountTest extends TestCase
{
    public function test_unauthenticated_accounts()
    {
        $response = $this->get('/admin/accounts');

        $response->assertStatus(302)
            ->assertRedirect('/admin/login');
    }

    public function test_get_all_accounts()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get('/admin/accounts');

        $response->assertStatus(200);
    }

    public function test_get_single_account_not_found()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get("/admin/account/454545/edit");

        $response->assertStatus(302)
                    ->assertRedirect("");
    }

    public function test_get_single_account()
    {
        $user = User::factory()->create();
        $account = Account::factory()->create();

        $response = $this->actingAs($user)
            ->get("/admin/account/{$account->id}/edit");

        $response->assertStatus(200);
    }

    public function test_update_account()
    {        
        $user = User::factory()->create();
        $account = Account::factory()->create();

        $response = $this->actingAs($user)
            ->put("/admin/account/{$account->id}/update", [
                'name' => 'Test Name',
            ]);

        $response->assertStatus(302)
                    ->assertRedirect("/admin/account/{$account->id}/edit");
    }

    public function test_delete_account()
    {
        $user = User::factory()->create();
        $account = Account::factory()->create();

        $response = $this->actingAs($user)
            ->delete("/admin/account/{$account->id}/delete");

        $response->assertStatus(302)
                    ->assertRedirect("/admin/accounts");
    }

    public function test_account()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get("/admin/account");

        $response->assertStatus(200);
    }

    public function test_create_account()
    {
        $user = User::factory()->create();
        $account = Account::factory()->create();

        $response = $this->actingAs($user)
            ->post("/admin/account", [
                'name' => 'Name Test',
                'balance' => '10.00',
            ]);

        $response->assertStatus(302)
                    ->assertRedirect("/admin/accounts");
    }
}
