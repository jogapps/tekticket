<?php

use Illuminate\Database\Seeder;
use App\Model\Help;

class HelpTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $helpOne = new Help;
        $helpOne->name = 'Accessible Seats';
        $helpOne->image = 'icon_accessible_seats2x.png';
        $helpOne->content = 'Fan Safety Is Our Priority: For Your Event’s Refund or Credit Eligibility Visit Your Account or Learn More About Options for Canceled, Rescheduled and Postponed Events';
        $helpOne->save();

        $helpTwo = new Help;
        $helpTwo->name = 'Manage Tickets';
        $helpTwo->image = 'icon_my_account2x.png';
        $helpTwo->content = 'What\'s magical about Mon Jan 2 15:04:05 MST 2006? By formatting this date a bit differently…';
        $helpTwo->save();

        $helpThree = new Help;
        $helpThree->name = 'Buy Tickets';
        $helpThree->image = 'icon_ticket_purchases2x.png';
        $helpThree->content = 'What\'s magical about Mon Jan 2 15:04:05 MST 2006? By formatting this date a bit differently…';
        $helpThree->save();

        $helpFour = new Help;
        $helpFour->name = 'Wallet';
        $helpFour->image = 'icon_tm_policiessecurity2x.png';
        $helpFour->content = 'What\'s magical about Mon Jan 2 15:04:05 MST 2006? By formatting this date a bit differently…';
        $helpFour->save();

        $helpFive = new Help;
        $helpFive->name = 'Gift Voucher';
        $helpFive->image = 'icon_my_account2x.png';
        $helpFive->content = 'What\'s magical about Mon Jan 2 15:04:05 MST 2006? By formatting this date a bit differently…';
        $helpFive->save();

        $helpSix = new Help;
        $helpSix->name = 'Policy & Security';
        $helpSix->image = 'icon_my_account2x.png';
        $helpSix->content = 'What\'s magical about Mon Jan 2 15:04:05 MST 2006? By formatting this date a bit differently…';
        $helpSix->save();
    }
}
