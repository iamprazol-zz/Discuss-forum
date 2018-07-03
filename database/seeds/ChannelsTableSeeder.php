<?php

use Illuminate\Database\Seeder;
use App\Channel;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $channel1 = ['title' => 'Core PHP' , 'slug' => str_slug('Core PHP')];
		$channel2 = ['title' => 'Laravel' , 'slug' => str_slug('Laravel')];
		$channel3 = ['title' => 'Vuejs' , 'slug' => str_slug('Vuejs')];
		$channel4 = ['title' => 'Javascript' , 'slug' => str_slug('Javascript')];
		$channel5 = ['title' => 'Python' , 'slug' => str_slug('Python')];
        $channel6 = ['title' => 'Java' , 'slug' => str_slug('Java')];
        $channel7 = ['title' => 'C' , 'slug' => str_slug('C')];
        $channel8 = ['title' => 'C++' , 'slug' => str_slug('C++')];

        Channel::create($channel1);
		Channel::create($channel2);
		Channel::create($channel3);
		Channel::create($channel4);
		Channel::create($channel5);
		Channel::create($channel6);
		Channel::create($channel7);
		Channel::create($channel8);

	}
}
