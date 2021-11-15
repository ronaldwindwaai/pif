<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    public function test_register_form()
    {
        $response = $this->get('/register');
        $response->assertSuccessful();
        $response->assertViewIs('auth.register');
    }

    public function test_user_register()
    {
        $response = $this->post('/register', [
            'name' => 'tt tt',
            'email' => 'email@email.com',
            'password' => 'ProgramacaoÉAmor',
            'password_confirmation' => 'ProgramacaoÉAmor',
        ]);
        $response->assertRedirect('/home');
    }

    public function test_user_register_error_confirm_pass()
    {
        $response = $this->post('/register', [
            'name' => 'tt tt',
            'email' => 'email@email.com',
            'password' => 'ProgramacaoÉAmor',
            'password_confirmation' => 'ProgramarÉPaz',
        ]);
        $response->assertRedirect('/');
    }

    public function test_user_register_error_mail_format_pass()
    {
        $response = $this->post('/register', [
            'name' => 'tt tt',
            'email' => 'emailgemail.com',
            'password' => 'ProgramacaoÉAmor',
            'password_confirmation' => 'ProgramacaoÉAmor',
        ]);
        $response->assertRedirect('/');
    }

    public function test_user_can_view_a_login_form()
    {
        $response = $this->get('/login');
        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }

    public function test_user_cannot_view_a_login_form_when_authenticated()
    {
        $user = factory(User::class)->make();
        $response = $this->actingAs($user)->get('/login');
        $response->assertRedirect('/home');
    }

    public function test_user_can_login_with_correct_credentials()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt($password = 'ProgramacaoÉAmor'),
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $password,
        ]);
        $response->assertRedirect('/home');
        $this->assertAuthenticatedAs($user);
    }

    public function test_user_cannot_login_with_incorrect_password()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt('ProgramacaoÉAmor'),
        ]);

        $response = $this->from('/login')->post('/login', [
            'email' => $user->email,
            'password' => 'invalid-password',
        ]);

        $response->assertRedirect('/login');
        $response->assertSessionHasErrors('email');

        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }
}
