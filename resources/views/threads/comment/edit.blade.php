@extends('layouts.app')

@section('content')

    <div class="mx-auto container">
        <div class="row-span-1">
            <h4 class="mt-5 underline hover:no-underline text-blue-600 hover:text-black transition-all"><a href="{{ url()->previous() }}"><- Back</a></h4>
            <h1 class="mt-20 text-5xl">Comment</h1>
            <form class="mt-20" action="{{ route('comments.update', $comment->id) }}" enctype="multipart/form-data" method="post">
                @csrf
                @method('PATCH')
                <textarea class="resize-none w-100 h-50" placeholder="Comment" name="body">{{ old('body') }}</textarea><br>
                <button class="bg-blue-600 text-white p-2 rounded" type="submit">Comment</button>
            </form>
        </div>
    </div>

@endsection
