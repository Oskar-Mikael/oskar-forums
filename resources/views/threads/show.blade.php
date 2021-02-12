@extends('layouts.app')
<title>{{ $thread->title }} - Oskar Forums</title>
@section('content')

    <div class="mx-auto container">
        <div class="row-span-1">
            <div class="col-auto">
                <div>
                    <h4 class="mt-5 underline hover:no-underline text-blue-600 hover:text-black transition-all"><a href="{{ route('threads.index') }}"><- Back</a></h4>
                    @if(session()->has('message'))
                        <div id="threads-delete-message" class="text-2xl text-white text-center mt-20 bg-green-500 w-1/2 mx-auto py-1 rounded border-black border-2">
                            {{ session()->get('message') }}
                            <button id="threads-delete-message-button" class="float-right mr-5 outline-none">X</button>
                        </div>
                    @endif
                        <article>

                            <h2 class="text-5xl mt-20 mb-5">{{ $thread->title }}</h2>
                            <h3 class="text-2xl mb-20">
                                {{ $thread->body }}

                            </h3>
                        </article>
                    <p class="text-gray-400">{{ \Carbon\Carbon::parse($thread->created_at)->diffForHumans() }}</p>
                        @if($thread->created_at != $thread->updated_at)
                            <p class="text-gray-400">(Edited)</p>
                            @endif
                    @can ('update', $thread)
                        <a class="underline hover:no-underline text-blue-600 hover:text-black" href="/threads/{{ $thread->id }}/edit">Edit Thread</a><br>
                    @endcan

                    @can ('update', $thread)
                        <form action="{{ route('threads.destroy', $thread->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" name="delete" onclick="return confirm('Are you sure you want to delete this thread?')" class="rounded 2xl:bg-red-600 text-white py-2 px-4 my-10">Delete Thread</button>
                        </form>
                    @endcan
                        <hr>

                </div>
            </div>
        </div>

        <div class="row-span-1 mt-10">
            <h2 class="text-3xl mb-2">Comments</h2>


            @foreach($thread->comments as $comment)
                <div class="my-5 border border-black">
                <h2 class="font-bold">{{ $comment->user->name }}</h2>
                <p>{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</p>

                @can ('update', $comment)
                    <form action="{{ route('comments.destroy', $comment->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" name="delete" onclick="return confirm('Are you sure you want to delete this comment?')" class="outline-none text-red-800 hover:text-red-500">Delete Comment</button>
                    </form>
                @endcan



                <h3 class="mt-5 pb-20 text-2xl">{{ $comment->body }}</h3>
            </div>
            @endforeach

            @if (Auth::user())
                <a href="/threads/{{ $thread->id }}/comment" class="mb-10 underline hover:no-underline text-blue-600 hover:text-black">Post comment</a>
            @else
                <h3 class="text-2xl">
                    To post a comment, please <a class="underline hover:no-underline text-blue-600 hover:text-black" href="{{ route('login') }}">login</a>
                </h3>
            @endif
        </div>
    </div>

@endsection
