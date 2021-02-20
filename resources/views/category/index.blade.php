@extends('layouts.app')

@section('content')

    <div class="mx-auto container">
        <h1 class="text-center mt-16 text-5xl">
            Categories
        </h1>
        <div class="text-center mt-16 text-2xl">
            <ul>
        @foreach ($categories as $category)
            <li class="mb-6" ><a href="/category/{{ $category->id }}">{{ $category->title }}</a></li>
        @endforeach
            </ul>
        </div>
    </div>

@endsection
