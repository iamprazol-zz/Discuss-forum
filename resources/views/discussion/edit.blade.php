@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading text-center">Update a discussion</div>

        <div class="panel-body">

            <form action="{{ route('discussion.update' , ['id' => $discussion->id]) }}" method="post">

                {{ csrf_field() }}



                <div class="form-group">

                    <label for="content">Edit the question</label>
                    <textarea name="content" id="content" cols="30" rows="10" value="{{ old('content') }}" class="form-control">{{ $discussion->content }}</textarea>

                </div>

                <div class="form-group">

                    <button class="btn btn-success pull-right" type="submit">Update discussion</button>

                </div>

            </form>

        </div>
    </div>

@endsection
