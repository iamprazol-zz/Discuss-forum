<?php

namespace App\Http\Controllers;

use App\Reply;
use App\Like;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RepliesController extends Controller
{
    public function like($id){
    	Like::create([
    		'reply_id' => $id,
			'user_id' => Auth::id()
		]);

    	Session::flash('success' , 'Reply liked successfully');

    	return redirect()->back();
	}

	public function unlike($id){
    	$like = Like::where('reply_id' , $id)->where('user_id' , Auth::id())->first();

    	$like->delete();

    	Session::flash('success' , 'Reply unliked successfully');

    	return redirect()->back();
	}

	public function best($id){

    	$reply= Reply::find($id);

    	$reply->best = 1;

    	$reply->save();

    	$reply->user->points += 200;
    	$reply->user->save();

    	Session::flash('success' , 'Reply marked as best successfully');

    	return redirect()->back();

	}



	public function edit($id){
		return view('reply.edit' , ['reply' => Reply::where('id' , $id)->first()]);
	}

	public  function update($id){
		$this->validate(request() , [
			'content' => 'required'
		]);

		$r = Reply::find($id);

		$r->content = request()->content;

		$r->save();


		Session::flash('success' , 'Reply updated successfully');

		return redirect()->route('discussion' , ['slug' => $r->discussion->slug]);
	}

}
