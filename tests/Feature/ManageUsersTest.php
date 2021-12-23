<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageUsersTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function admin_can_create_new_user()
    {
        // admin dalam status sudah login
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@learn-laravel.com',
            'password' => bcrypt('inigarahasia')
        ]);

        $this->actingAs($user);

        // admin buka halaman daftar user
        $this->visit('/user');

        // admin klik tombol `Create User`
        $this->click('Create User');


        // tampil form `Create New User`
        $this->seePageIs('/user/create');

        $this->seeElement('form', [
            'action' => url('/user')
        ]);

        // admin submit form berisi data user baru
        $this->submitForm('Save', [
            'name' => 'Gun Gun Priatna',
            'email' => 'gungunpriatna@test.com',
            'password' => 'inibukanrahasia12345'
        ]);

        // record ada di database
        $this->seeInDatabase('users', [
            'name' => 'Gun Gun Priatna',
            'email' => 'gungunpriatna@test.com',
        ]);

        // lihat halaman ter-redirect
        $this->seePageIs('/user');

        $this->see('Gun Gun Priatna');
        $this->see('gungunpriatna@test.com');

    }

    /** @test */
    public function admin_can_browser_users_index_page()
    {
        $this->assertTrue(true);
    }

    /** @test */
    public function admin_can_edit_an_existing_user()
    {
        $this->assertTrue(true);
    }

    /** @test */
    public function admin_can_delete_an_existing_user()
    {
        $this->assertTrue(true);
    }
}
