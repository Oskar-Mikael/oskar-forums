@extends('layouts.app')

@section('content')

    <div class="mx-auto container">
        <div class="row-span-1">
            <h4 class="mt-5 underline hover:no-underline text-blue-600 hover:text-black transition-all"><a href="{{ route('threads.index') }}"><- Back</a></h4>
            <h1 class="mt-20 text-5xl">Create Thread</h1>
            <form class="mt-20" action="{{ route('threads.store') }}" enctype="multipart/form-data" method="post">
                @csrf

                <input type="text" name="title" class="mb-10 w-96" placeholder="Title">
                @if ($errors->has('title'))
                    <span class="text-red-600" role="alert">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
                <br>
                <textarea class="resize-none w-96 h-96" placeholder="Body" name="body">{{ old('body') }}</textarea>
                @if ($errors->has('body'))
                    <span class="text-red-600" role="alert">
                        <strong>{{ $errors->first('body') }}</strong>
                    </span>
                @endif
                <br>
                <button class="bg-blue-600 text-white p-2 rounded" type="submit">Create Thread</button>
            </form>
        </div>
    </div>

@endsection
