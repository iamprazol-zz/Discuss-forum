@extends('layouts.app')

@section('content')



        <div class="panel panel-default">

            <div class="panel-heading">
                <img src="{{ $discuss->user->avatar }}" alt="" width="40px" height="40px"/>&nbsp;&nbsp;&nbsp;
                <span>{{ $discuss->user->name }}  <b>({{ $discuss->user->points }})</b></span>



            @if($discuss->hasBestAnswer())

                    <span class="btn btn pull-right btn-success btn-xs">closed</span>


                @else

                    <span class="btn btn pull-right btn-danger btn-xs">open</span>


                @endif


                @if(Auth::id() == $discuss->user->id)

                    @if(!$discuss->hasBestAnswer())

                        <a href="{{ route('discussion.edit' , ['slug' => $discuss->slug]) }}" class="btn btn-info btn-xs pull-right" style="margin-right: 8px;">Edit</a>


                    @endif

                @endif

                @if($discuss->is_being_watched_by_auth_user())

                    <a href="{{ route('discussion.unwatch' , ['id' => $discuss->id]) }}" class="btn btn-default btn-xs pull-right" style="margin-right: 8px;">unwatch</a>


                @else

                    <a href="{{ route('discussion.watch' , ['id' => $discuss->id]) }}" class="btn btn-default btn-xs pull-right" style="margin-right: 8px;">watch</a>


                @endif

            </div>




            <div class="panel-body">

                <h4 class="text-center">

                    <b>{{ $discuss->title }}</b>

                </h4>

                <hr>

                <p class="text-center">

                    {!! Markdown::convertToHtml($discuss->content) !!}

                </p>

            </div>

            <hr>

            @if($best)



                <div class="text-center" style="padding: 40px;">

                    <h4 class="text-center"><b>Best Answer</b></h4>

                    <div class="panel panel-success">

                        <div class="panel-heading">

                                <img src="{{ $best->user->avatar }}" alt="" width="40px" height="40px"/>&nbsp;&nbsp;&nbsp;
                            <span>{{ $best->user->name }} <b>({{ $best->user->points }})</b></span>

                        </div>

                        <div class="panel-body">

                            {!! Markdown::convertToHtml($best->content) !!}

                        </div>

                    </div>

                </div>
                    @endif



            <div class="panel-footer">

                <span>

                    {{ $discuss->reply->count() }} Replies

                </span>

                <a href="{{ route('channel' , ['slug' => $discuss->channel->slug]) }}" class="pull-right btn btn-default btn-xs">{{ $discuss->channel->title }}</a>
            </div>


        </div>


    @foreach($discuss->reply as $r)

        <div class="panel panel-default">

            <div class="panel-heading">

                <img src="{{ $r->user->avatar }}" alt="" width="40px" height="40px"/>&nbsp;&nbsp;&nbsp;
                <span>{{ $r->user->name }} <b>({{ $r->user->points }})</b></span>
                @if(!$r->best)

                    @if(Auth::id() == $discuss->user->id)

                        <a href="{{ route('discussion.best.answer' , ['id' => $r->id]) }}" class="btn btn-xs btn-info pull-right" style="margin-left: 9px;">Mark as best answer</a>

                    @endif

                @endif

                @if(Auth::id() == $r->user->id)

                    @if(!$r->best)

                        <a href="{{ route('reply.edit' , ['id' => $r->id]) }}" class="btn btn-xs btn-info pull-right" >Edit</a>


                    @endif

                @endif

            </div>



            <div class="panel-body">

                <p class="text-center">

                    {!! Markdown::convertToHtml($r->content) !!}

                </p>

            </div>

            <div class="panel-footer">

                @if($r->is_liked_by_auth_user())

                <a href="{{ route('reply.unlike' , ['id' => $r->id]) }}" class="btn btn-danger btn-xs">Unlike <span class="badge">{{ $r->likes->count() }}</span></a>

                @else

                    <a href="{{ route('reply.like' , ['id' => $r->id]) }}" class="btn btn-success btn-xs">Like<span class="badge">{{ $r->likes->count() }}</a>


                @endif

                <span class="pull-right">{{ $r->created_at->diffForHumans() }}</span>

            </div>


        </div>


    @endforeach


        <div class="panel panel-default">

            <div class="panel-body">

                @if(Auth::check())

                    <form action="{{ route('discussion.reply' , ['id' => $discuss->id]) }}" method="post" >

                        {{ csrf_field() }}

                        <div class="form-group">

                            <label for="reply">Leave a reply : </label>
                            <textarea name="reply" id="reply" cols="30" rows="10" class="form-control"></textarea>

                        </div>

                        <div class="form-group">

                            <button class="btn pull-right">Leave a reply</button>

                        </div>

                    </form>


                @else

                    <div class="text-center">

                        <h2>Sign up to reply</h2>


                    </div>

                @endif

            </div>

        </div>






@endsection
