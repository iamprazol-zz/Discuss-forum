<?php

namespace App\Http\Controllers;

use App\Discussion;
use App\Reply;
use App\User;
use App\Channel;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class ForumsController extends Controller
{
    public function index(){

    	$user = User::all();
    	$reply = Reply::all();

    	switch (request('filter')){

			case 'me':
				$discussion = Discussion::where('user_id' , Auth::id())->paginate(3);
				break;

			case 'solved':
				$answered = array();
				foreach(Discussion::all() as $d){
					if($d->hasBestAnswer()){
						array_push($answered , $d);
					}
				}

				$discussion = new Paginator($answered,3);
				break;

			case 'unsolved':
				$unanswered = array();
				foreach(Discussion::all() as $d){
					if(!$d->hasBestAnswer()){
						array_push($unanswered , $d);
					}
				}

				$discussion = new Paginator($unanswered,3);
				break;

			default :
				$discussion = Discussion::orderBy('created_at' , 'desc')->paginate(3);

				break;

		}


    	return view('forum' ,[
    		'discussion' => $discussion ,
			'user' => $user ,
			'reply' => $reply
		]);
	}


	public function channel($slug)
	{
		$channel = Channel::where('slug', $slug)->first();

		return view('channel')->with('discussion', $channel->discussion);
	}




	}
