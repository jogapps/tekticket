<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(OtherInformationSeeder::class);
        $this->call(AdministratorTableSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(OrganizersSeeder::class);
        $this->call(MenuTableSeeder::class);
        $this->call(EventTableSeeder::class);
        $this->call(FaqSeeder::class);
        $this->call(HelpTableSeeder::class);
        $this->call(WalletConfigSeeder::class);
        $this->call(PagesTableSeeder::class);

    }
}
