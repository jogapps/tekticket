<?php

use Illuminate\Database\Seeder;

class AdministratorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new \App\Model\Administrator();
        $admin->name = 'Razaq Ogunlade';
        $admin->email = 'razaqofficial@gmail.com';
        $admin->password = bcrypt('razaq123');
        $admin->save();
    }
}
