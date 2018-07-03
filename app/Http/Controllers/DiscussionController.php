<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\Discussion;
use App\User;
use App\Reply;
use Notification;
use Illuminate\Http\Request;

class DiscussionController extends Controller
{
	public function create()
	{
		return view('discuss');
	}

	public function store()
	{
		$r = request();

		$this->validate($r, [
			'channel_id' => 'required',
			'content' => 'required',
			'title' => 'required',
		]);


		$discussion = Discussion::create([
			'title' => $r->title ,
			'channel_id' => $r->channel_id ,
			'user_id' => Auth::id() ,
			'content' => $r->get('content') ,
			'slug' => str_slug($r->title) ,
		]);


		Session::flash('success' , 'Discussion created successfully');

		return redirect()->route('discussion' , ['slug' => $discussion->slug]);

	}


	public  function show($slug){
		$discussion = Discussion::where('slug' , $slug)->first();
		$user = User::all();
		$reply = Reply::all();

		$best = Reply::where('discussion_id',$discussion->id)->where('best' , 1)->first();

		return view('discussion.show')->with('discuss' , $discussion)->with('best' , $best)->with('user' , $user)->with('reply' , $reply);
	}


	public function reply($id){
		$d = Discussion::find($id);

		$r = Reply::create([
			'user_id' => Auth::id() ,
			'discussion_id' => $id ,
			'content' => request()->reply
		]);

		$r->user->points += 100;
		$r->user->save();

		$watchers = array();

		foreach($d->watcher as $watcher):
			array_push($watchers , User::find($watcher->user_id));
		endforeach;

		Notification::send($watchers , new \App\Notifications\NewReplyAdded($d));


		Session::flash('success' , 'Replied successfully..');

		return redirect()->back();
	}


	public function edit($slug){
		return view('discussion.edit' , ['discussion' => Discussion::where('slug' , $slug)->first()]);
	}

	public  function update($id){
		$this->validate(request() , [
			'content' => 'required'
		]);

		$d = Discussion::find($id);

		$d->content = request()->content;

		$d->save();


		Session::flash('success' , 'Discussion updated successfully');

		return redirect()->route('discussion' , ['slug' => $d->slug]);
	}
}