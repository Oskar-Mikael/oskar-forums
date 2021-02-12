@extends('layouts.app')

@section('content')

    <div class="mx-auto container">
        <div class="row-span-1">
            <h4 class="mt-5 underline hover:no-underline text-blue-600 hover:text-black transition-all"><a href="/threads/{{ $thread->id }}"><- Back</a></h4>
            <h1 class="mt-20 text-5xl">Edit Thread</h1>
            <form class="mt-20" action="{{ route('threads.update', $thread->id) }}" enctype="multipart/form-data" method="post">
                @method('PATCH')
                @csrf
                <input required type="text" name="title" class="mb-10 w-96" placeholder="Title" value="{{ old('title') ??  $thread->title }}"><br>

                <textarea required class="resize-none w-96 h-96" placeholder="Body" name="body">{{ old('body') ?? $thread->body }}</textarea><br>

                <button class="bg-blue-600 text-white p-2 rounded" type="submit">Edit Thread</button>
            </form>
        </div>
    </div>

@endsection
