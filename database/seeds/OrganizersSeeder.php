<?php

use Illuminate\Database\Seeder;

class OrganizersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Model\Organizer::create([
            'name' => 'Tee & Tee Group',
            'email' => 'tee123@example.com',
            'email_verified_at' => now(),
            'password' => bcrypt('tee123')
        ]);
    }
}
