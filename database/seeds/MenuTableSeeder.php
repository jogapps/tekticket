<?php

use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu1 = new App\Model\Menu();
        $menu1->name = 'Concert';
        $menu1->slug = Str::slug('Concert');
        $menu1->save();

        $menu2 = new App\Model\Menu();
        $menu2->name = 'Sports';
        $menu2->slug = Str::slug('Sports');
        $menu2->save();

        $menu3 = new App\Model\Menu();
        $menu3->name = 'Art & Theater';
        $menu3->slug = Str::slug('Art & Theater');
        $menu3->save();

        $menu1->categories()->saveMany([
            new App\Model\Category(['name' => 'Music','slug' => 'music']),
            new App\Model\Category(['name' => 'Classical','slug' => 'classical']),
            new App\Model\Category(['name' => 'Jazz & Blues','slug' => 'jazz-blues']),
            new App\Model\Category(['name' => 'Folk & Country','slug' => 'folk-country']),
            new App\Model\Category(['name' => 'Choral Singing','slug' => 'choral-singing']),
            new App\Model\Category(['name' => 'Rock & Pop','slug' => 'rock-pop']),
        ]);

        $menu2->categories()->saveMany([
            new App\Model\Category(['name' => 'Football','slug' => 'football']),
            new App\Model\Category(['name' => 'Basketball','slug' => 'basketball']),
            new App\Model\Category(['name' => 'Boxing','slug' => 'boxing']),
            new App\Model\Category(['name' => 'Ice Skating','slug' => 'ice-skating']),
            new App\Model\Category(['name' => 'Athletics','slug' => 'athletics']),
            new App\Model\Category(['name' => 'Volleyball','slug' => 'volleyball']),
            new App\Model\Category(['name' => 'Handball','slug' => 'handball']),
            new App\Model\Category(['name' => 'Cycling','slug' => 'cycling']),
        ]);

        $menu3->categories()->saveMany([
            new App\Model\Category(['name' => 'Ballet & Dance','slug' => 'ballet-dance']),
            new App\Model\Category(['name' => 'Film & Cinema','slug' => 'film-cinema']),
            new App\Model\Category(['name' => 'Readings','slug' => 'readings']),
            new App\Model\Category(['name' => 'Theater','slug' => 'theater']),
            new App\Model\Category(['name' => 'Shows','slug' => 'shows']),
            new App\Model\Category(['name' => 'Art & Culture Festivals','slug' => 'art-culture-festivals']),

        ]);
    }
}
