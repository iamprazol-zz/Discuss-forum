@extends('layouts.app')

@section('content')

           @foreach($discussion as  $discuss)

            <div class="panel panel-default">

                <div class="panel-heading">

                    <img src="{{ $discuss->user->avatar }}" alt="" width="40px" height="40px"/>&nbsp;&nbsp;&nbsp;

                    <span><b>{{ $discuss->user->name }}</b> , {{ $discuss->created_at->diffForHumans() }}</span>

                    <a href="{{ route('discussion' , ['slug' => $discuss->slug]) }}" class="btn btn-default btn-xs pull-right" style="margin-left: 9px;">View</a>


                @if($discuss->hasBEstAnswer())

                        <span class="btn btn pull-right btn-success btn-xs">closed</span>


                    @else

                        <span class="btn btn pull-right btn-danger btn-xs">open</span>


                    @endif


                </div>



                <div class="panel-body">

                    <h4 class="text-center">

                        <b>{{ $discuss->title }}</b>

                    </h4>

                    <p class="text-center">

                        {{ str_limit($discuss->content , 50) }}

                    </p>

                </div>

                <div class="panel-footer">

                <span> 
                
                    {{ $discuss->reply->count() }} Replies
                
                </span>

                    <a href="{{ route('channel' , ['slug' => $discuss->channel->slug]) }}" class="pull-right btn btn-default btn-xs">{{ $discuss->channel->title }}</a>
                </div>


            </div>

            @endforeach
    <div class="text-center">

        {{ $discussion->links() }}

    </div>
@endsection
