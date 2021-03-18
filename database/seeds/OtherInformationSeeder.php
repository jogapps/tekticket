<?php

use Illuminate\Database\Seeder;

class OtherInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Model\OtherInformation::create([
            'email' => 'support@tekticket.com',
            'phone_1' => 'support@tekticket.com',
            'phone_2' => 'support@tekticket.com',
            'facebook' => 'https://facebook.com/tekticket',
            'instagram' => 'https://instagram.com/tekticket',
            'twitter' => 'https://twitter.com/tekticket',
        ]);
    }
}
