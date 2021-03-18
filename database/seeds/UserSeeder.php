<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer = \App\Model\User::create([
            'name' => 'Ben Smith',
            'email' => 'ben123@example.com',
            'email_verified_at' => now(),
            'password' => bcrypt('ben123')
        ]);

        factory(\App\Model\User::class,5)->create();
    }
}
