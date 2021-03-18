<?php

use Illuminate\Database\Seeder;
use App\Model\Page;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pageOne = new Page;
        $pageOne->title = 'How do I get a refund?';
        $pageOne->slug = 'how-do-i-get-a-refund';
        $pageOne->general = false;
        $pageOne->top_question = true;
        $pageOne->content = "<p>This is how you get refund</p>";
        $pageOne->save();

        $pageTwo = new Page;
        $pageTwo->title = 'What happen to my ticket, if I did not attend an event?';
        $pageTwo->slug = 'what-happen-to-my-ticket';
        $pageTwo->general = false;
        $pageTwo->top_question = true;
        $pageTwo->content = "<p>This is how What happen to your ticket</p>";
        $pageTwo->save();

        $pageThree = new Page;
        $pageThree->title = 'How do I contact the Administrators';
        $pageThree->slug = 'how-do-i-contact-the-administrators';
        $pageThree->general = false;
        $pageThree->top_question = true;
        $pageThree->content = "<p>Click on contact us link, send your message and we will get back to you if necessary</p>";
        $pageThree->save();


        $pageFour = new Page;
        $pageFour->title = 'Privacy and Policy';
        $pageFour->slug = 'privacy-and-policy';
        $pageFour->general = true;
        $pageFour->top_question = true;
        $pageFour->content = "<p>This is the privacy and policy page</p>";
        $pageFour->save();

        $pageFive = new Page;
        $pageFive->title = 'How Can I sell Ticket';
        $pageFive->slug = 'how-can-i-sell-ticket';
        $pageFive->general = true;
        $pageFive->top_question = true;
        $pageFive->content = "<p>This is how What happen to your ticket</p>";
        $pageFive->save();

    }
}
