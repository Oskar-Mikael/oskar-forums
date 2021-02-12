@extends('layouts.app')

@section('content')

    <div class="mx-auto container">
        <div class="row-span-1">
            <h4 class="mt-5 underline hover:no-underline text-blue-600 hover:text-black transition-all"><a href="/threads/{{ $thread->id }}"><- Back</a></h4>
            <h1 class="mt-20 text-5xl">Comment</h1>
            <form class="mt-20" action="{{ route('comments.store', $thread->id) }}" enctype="multipart/form-data" method="post">
                @csrf
                <textarea class="resize-none w-100 h-50" placeholder="Comment" name="body">{{ old('body') }}</textarea><br>
                @if ($errors->has('body'))
                    <span class="text-red-600" role="alert">
                        <strong class="mb-10">{{ $errors->first('body') }}</strong>
                    </span>
                @endif
                <br>
                <button class="bg-blue-600 text-white p-2 rounded" type="submit">Comment</button>
            </form>
        </div>
    </div>

@endsection
