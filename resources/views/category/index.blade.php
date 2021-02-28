@extends('layouts.app')

@section('content')

    <div class="mx-auto container">
        <h1 class="text-center mt-16 text-5xl">
            Categories
        </h1>
        <div class="text-center mt-16 text-2xl">
            <ul>
        @foreach ($categories as $category)
            <li><a class="link-text" href="/category/{{ $category->id }}">{{ $category->title }}</a></li>
            <p class="mb-6">Posts: <strong>{{ $category->threads->count() }}</strong></p>
        @endforeach
            </ul>
            <h3>
                <a class="link-text" href="/threads">
                    All threads
                </a><br>
                Total posts: <strong>{{$threads->count()}}</strong>
            </h3>
        </div>
    </div>

@endsection
