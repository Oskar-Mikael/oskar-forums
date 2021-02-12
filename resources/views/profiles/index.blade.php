@extends('layouts.app')
<title>User {{ Auth::user()->name }} - Oskar Forums</title>
@section('content')



    <div class="container mx-auto">
        <h1 class="mt-5 text-5xl mb-20">{{ $user->name }}</h1>
        <h2 class="mb-10 text-3xl">Threads</h2>
         @if ($user->threads->count() === 0)  @else <p class="text-2xl">Total: {{ $user->threads->count() }} </p>@endif

        @if ($user->threads->count() == 0)
            <h2>There are no threads from this user</h2>


        @else
        @foreach($user->threads as $thread)
                <article class="mb-10">
                    <h3 class="text-5xl mt-20 mb-5">{{ $thread->title }}</h3>
                    <p class="text-gray-400">{{ \Carbon\Carbon::parse($thread->created_at)->diffForHumans() }}</p>

                    <a class="underline hover:no-underline text-blue-600 hover:text-black transition-all" href="{{ route('threads.show', $thread->id) }}">View thread</a>
                </article>
                <hr>
        @endforeach
        @endif
    </div>
@endsection
