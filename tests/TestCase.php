<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp() : void
    {
        parent::setUp();

        $this->withoutExceptionHandling();

        \Artisan::call('passport:install');
    }

    protected function signIn()
    {
        $user = create('App\User');

        $token = $user->createAccessToken();
        $header = ['Authorization' => "Bearer $token"];

        return $header;
    }
}
