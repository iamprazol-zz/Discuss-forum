<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;


class ScrapingController extends Controller
{
    public function index(Client $client)
	{

		$css_selector = ".archive category category-events category-5 woothemes gecko .wrapper .container h2.camp.right ";
		$crawler = $client->request('GET', 'http://bloodmembers.org/category/events/');
		$output = $crawler->filter($css_selector)->extract('name');
	var_dump($output);
	}
}
