<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ManageUsersTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function admin_can_create_new_user()
    {
        // admin dalam status sudah login
        $this->setAdmin();

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
        // admin dalam status sudah login
        $this->setAdmin();

        // generate 3 sample user record
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();
        $user3 = User::factory()->create();

        // admin buka halaman daftar user
        $this->visit('/user');

        // admin melihat 3 data tampil pada halaman daftar user
        $this->see($user1->name);
        $this->see($user2->name);
        $this->see($user3->name);

        $this->seeElement('a', [
            'id' => 'edit_user_' . $user1->id,
            'href' => route('user.edit', $user1->id)
        ]);

        $this->seeElement('a', [
            'id' => 'edit_user_' . $user2->id,
            'href' => route('user.edit', $user2->id)
        ]);

        $this->seeElement('a', [
            'id' => 'edit_user_' . $user3->id,
            'href' => route('user.edit', $user3->id)
        ]);
    }

    /** @test */
    public function admin_can_edit_an_existing_user()
    {
        // admin dalam status sudah login
        $this->setAdmin();

        // generate 1 record user pada table `users`
        $user = User::factory()->create();

        // admin buka halaman daftar user
        $this->visit('/user');

        // klik tombol edit user 1
        $this->click('edit_user_' . $user->id);

        // lihat URL edit user
        $this->seePageIs("/user/{$user->id}/edit");

        // tampil form edit user
        $this->seeElement('form', [
            'action' => route('user.update', $user->id)
        ]);

        // admin submit form berisi data yang diperbaharui
        $this->submitForm('Save Changes', [
            'name' => 'Gun Gun Priatna'
        ]);

        // lihat halaman ter-redirect
        $this->seePageIs('/user');

        // lihat record pada database sudah sesuai dengan data yang diperbaharui
        $this->seeInDatabase('users', [
            'id' => $user->id,
            'name' => 'Gun Gun Priatna'
        ]);
    }

    /** @test */
    public function admin_can_delete_an_existing_user()
    {
        // admin dalam status sudah login
        $this->setAdmin();

        // generate 1 record di table `users`
        $user = User::factory()->create();

        // admin buka halaman daftar user
        $this->visit('/user');

        // admin klik tombol delete
        $this->press('delete_user_'.$user->id);

        // lihat halaman ter-redirect
        $this->seePageIs('/user');

        // record user hilang dari table `users`
        $this->dontSeeInDatabase('users', [
            'id' => $user->id
        ]);
    }

    private function setAdmin()
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@learn-laravel.com',
            'password' => bcrypt('inigarahasia')
        ]);

        $this->actingAs($admin);
    }
}
