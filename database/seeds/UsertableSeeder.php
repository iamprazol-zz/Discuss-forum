<?php

use Illuminate\Database\Seeder;

class UsertableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
        	'name' => 'admin' ,
			'password' => bcrypt('admin') ,
			'email' => 'admin@discuss.com' ,
			'admin' => 1 ,
			'avatar' => asset('avatars/avatar.png') ,
		]);



		App\User::create([
			'name' => 'Prajjwal' ,
			'password' => bcrypt('prajjwal') ,
			'email' => 'iamprazol@discuss.com' ,
			'avatar' => asset('avatars/avatar.png') ,
		]);
    }
}
