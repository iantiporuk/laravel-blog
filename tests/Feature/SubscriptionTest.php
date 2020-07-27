<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SubscriptionTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function testSubscriptionPageOpen()
    {
        $response = $this->get('/subscription');
        $response->assertOk();
    }

    /**
     * @test
     */
    public function testSaveNewSubscription()
    {
        $response = $this->postFromSubscriptionPage('test1@blog.loc');
        $response
            ->assertRedirect('/subscription')
            ->assertSessionHas('success');

        $this->assertDatabaseHas('subscriptions', [
            'email' => 'test1@blog.loc',
        ]);
    }

    /**
     * @test
     */
    public function testValidateDuplicateEmail()
    {
        $this->seed(\SubscriptionSeeder::class);
        $response = $this->postFromSubscriptionPage('test@blog.loc');
        $response
            ->assertRedirect('/subscription')
            ->assertSessionHasErrors();
    }

    /**
     * @test
     */
    public function testValidateInvalidEmail()
    {
        $response = $this->postFromSubscriptionPage('test-blog.loc');
        $response
            ->assertRedirect('/subscription')
            ->assertSessionHasErrors();

        $this->assertDatabaseMissing('subscriptions', [
            'email' => 'test-blog.loc',
        ]);
    }

    /**
     * @test
     */
    public function testValidateEmptyEmail()
    {
        $response = $this->postFromSubscriptionPage('');
        $response
            ->assertRedirect('/subscription')
            ->assertSessionHasErrors();

        $this->assertDatabaseMissing('subscriptions', [
            'email' => 'test1@blog.loc',
        ]);
    }

    /**
     * @test
     */
    public function testUnsubscribeFormOpen()
    {
        $response = $this->get('/subscription/unsubscribe');
        $response->assertOk();
    }

    /**
     * @test
     */
    public function testUnsubscribeSuccessfully()
    {
        $this->seed(\SubscriptionSeeder::class);
        $this->assertDatabaseHas('subscriptions', [
            'email' => 'test@blog.loc',
        ]);

        $response = $this->delete('/subscription/unsubscribe', [
            'email' => 'test@blog.loc'
        ]);
        $response->assertRedirect();
        $this->assertDatabaseMissing('subscriptions', [
            'email' => 'test@blog.loc',
        ]);
    }

    /**
     * @test
     */
    public function testUnsubscribeValidateInvalidEmail()
    {
        $this->seed(\SubscriptionSeeder::class);
        $this->assertDatabaseHas('subscriptions', [
            'email' => 'test@blog.loc',
        ]);

        $response = $this->delete('/subscription/unsubscribe', [
            'email' => 'test-blog.loc'
        ]);
        $response
            ->assertRedirect()
            ->assertSessionHasErrors();
        $this->assertDatabaseHas('subscriptions', [
            'email' => 'test@blog.loc',
        ]);
    }

    /**
     * @test
     */
    public function testUnsubscribeValidateEmptyEmail()
    {
        $this->seed(\SubscriptionSeeder::class);
        $this->assertDatabaseHas('subscriptions', [
            'email' => 'test@blog.loc',
        ]);

        $response = $this->delete('/subscription/unsubscribe', [
            'email' => ''
        ]);
        $response
            ->assertRedirect()
            ->assertSessionHasErrors();
        $this->assertDatabaseHas('subscriptions', [
            'email' => 'test@blog.loc',
        ]);
    }

    /**
     * Make post request from /subscription page
     *
     * @param string $email
     * @return \Illuminate\Testing\TestResponse
     */
    private function postFromSubscriptionPage(string $email)
    {
        return $this->post('/subscription', [
            'email' => $email,
        ], [
            'Referer' => '/subscription',
        ]);
    }

}
