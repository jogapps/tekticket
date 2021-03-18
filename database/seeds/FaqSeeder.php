<?php

use Illuminate\Database\Seeder;
use App\Model\FaqCategory;
use App\Model\Faq;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $organizerFaqOne = new Faq;

        $organizerFaqOne->title = 'How Do I Sell My Ticket?';
        $organizerFaqOne->organizer = true;
        $organizerFaqOne->customer = false;
        $organizerFaqOne->content = 'Aperiam architecto autem cum debitis est impedit magnam, modi officia perferendis';
        $organizerFaqOne->save();

        $organizerFaqTwo = new Faq;
        $organizerFaqTwo->organizer = true;
        $organizerFaqTwo->customer = true;
        $organizerFaqTwo->title = 'What happens when a user fails to attend my event after buying ticket';
        $organizerFaqTwo->content = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam architecto autem cum debitis est impedit magnam';
        $organizerFaqTwo->save();

        $generalFaqThree = new Faq;
        $generalFaqThree->organizer = false;
        $generalFaqThree->customer = true;
        $generalFaqThree->title = 'Can I buy a ticket if I\'m disabled?';
        $generalFaqThree->content = 'Aperiam architecto autem cum debitis est impedit magnam, modi officia perferendis';
        $generalFaqThree->save();

    }
}
