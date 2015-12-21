<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->visit('/')
             ->see('TMS_42')
             ->click('Login')
             ->seePageIs('auth/login')
             ->click('Register')
             ->seePageIs('auth/register')
             ->click('English')
             ->seePageIs('auth/login');
    }
    public function testTraineeExample()
    {
        $user = new User(['name' => 'yasin']);
        $this->be($user);
        $this->visit('/home')
             ->see('History')
             ->see('Course')
             ->see('Subject')
             ->see('Calendar')
             ->see('Report')
             ->see('History')
             ->see('yasin')
             ->see('Enlighten Your Future');

    }
    public function testSupervisorExample()
    {
        $user = factory(App\User::class)->make([
        'name' => 'Yasin',
        'role' => 1,
        ]);
        $this->be($user);
        $this->visit('/home')
             ->see('Build');
    }
    public function testLogin()
    {
        // $user = factory(App\User::class)->make([
        // 'name' => 'Yasin',
        // 'role' => 1,
        // ]);
        // $this->be($user);
        $this->visit('/auth/register')
             ->type('yasin', 'name')
             ->type('yasin.buet@gmail.com', 'email')
             ->type('password', 'password')
             ->type('password', 'password_confirmation')
             ->press('Register')
             ->seePageIs('/home');
    }
}
