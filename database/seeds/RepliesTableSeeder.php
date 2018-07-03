<?php

use Illuminate\Database\Seeder;
use App\Reply;


class RepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $r1 = [
        	'user_id' => 1 ,
        	'discussion_id' => 1 ,
			'content' => 'I\'m developing an Android app and a RESTful API with Laravel 5 Framework. I\'ve got a trouble with the login activity: the flow is that the user ask a 8th characters code and the server web sends him a SMS with it. Then user can do the login using this code like a password.' ,

		];

		$r2 = [
			'user_id' => 1 ,
			'discussion_id' => 2 ,
			'content' =>'Core PHP is very basic PHP. It is used to create dynamic web pages. It works without any extra library. ... So it is very important to learn core or principle PHP programming to create dynamic web applications. You can see more about PHP from the official site of PHP Hypertext Preprocessor.PHP can be used on all main operating systems, including Linux, many Unix variants (including HP-UX, Solaris and OpenBSD), Microsoft Windows, Mac OS X, RISC OS, and probably others. PHP has also hold up for most of the web servers now. This includes Apache, IIS, and lots of others. And this includes any web server that can utilize the Fast CGI PHP binary, like lighttpd and nginx. PHP works as either a module, or as a CGI processor.	PHP is a well-liked server-side scripting language for the web. usually speaking, PHP is used to add a functionality to websites that HTML alone can\'t reach. But what does this actually mean?	' ,

		];

		$r3 = [
			'user_id' => 2,
			'discussion_id' => 3 ,
			'content' => 'I\'m developing an Android app and a RESTful API with Laravel 5 Framework. I\'ve got a trouble with the login activity: the flow is that the user ask a 8th characters code and the server web sends him a SMS with it. Then user can do the login using this code like a password.' ,

		];

		$r4 = [
			'user_id' => 2 ,
			'discussion_id' => 4 ,
			'content' =>'Core PHP is very basic PHP. It is used to create dynamic web pages. It works without any extra library. ... So it is very important to learn core or principle PHP programming to create dynamic web applications. You can see more about PHP from the official site of PHP Hypertext Preprocessor.PHP can be used on all main operating systems, including Linux, many Unix variants (including HP-UX, Solaris and OpenBSD), Microsoft Windows, Mac OS X, RISC OS, and probably others. PHP has also hold up for most of the web servers now. This includes Apache, IIS, and lots of others. And this includes any web server that can utilize the Fast CGI PHP binary, like lighttpd and nginx. PHP works as either a module, or as a CGI processor.	PHP is a well-liked server-side scripting language for the web. usually speaking, PHP is used to add a functionality to websites that HTML alone can\'t reach. But what does this actually mean?	' ,

		];

		Reply::create($r1);
		Reply::create($r2);
		Reply::create($r3);
		Reply::create($r4);


	}
}
