<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class ValidationTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSupervisorCreateUserValidation()
    {
        $user = new User;
        $input = ['name' => 'asif'];
        $this->assertFalse($user->validate($input));
        $input = ['email' => 'something@something.com'];
        $this->assertFalse($user->validate($input));
        $input = ['name' => 'asif', 'email' => 'asif@yahoo.com'];
        $this->assertTrue($user->validate($input));
        User::create($input);
        $input = ['name' => 'asif', 'email' => 'anotherasif@yahoo.com'];
        $this->assertFalse($user->validate($input));  
        $input = ['name' => 'anotherasif', 'email' => 'asif@yahoo.com'];
        $this->assertFalse($user->validate($input));
    }
}
