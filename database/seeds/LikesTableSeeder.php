<?php

use Illuminate\Database\Seeder;

use App\Like;
class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $l1 = [
        	'reply_id' => 2 ,
        	'user_id' => 2 ,
		];

		$l2 = [
			'reply_id' => 2 ,
			'user_id' => 1 ,
		];

		Like::create($l1);
		Like::create($l2);


    }
}
