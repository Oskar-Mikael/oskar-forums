@extends('layouts.app')
<head>
    <title>Threads - Oskar Forums</title>
</head>
@section('content')

    <div class="mx-auto container">
        <div class="row-span-1">
            <div class="col-auto">
                <div>
                    <h4 class="mt-5"><a class="link-text" href="/category"><- Back</a></h4>
                    @if(session()->has('message'))
                        <div id="threads-delete-message" class="text-2xl text-white text-center mt-20 bg-green-500 w-1/2 mx-auto py-1 rounded border-black border-2">
                            {{ session()->get('message') }}
                            <button id="threads-delete-message-button" class="float-right mr-5 outline-none">X</button>
                        </div>
                    @endif
                    <div class="text-center mt-10 text-4xl">
                        <h2>
                            {{$category->title}}
                        </h2>
                    </div>
                    <div class="mt-10 flex justify-end">
                        
                    @if (Auth::user())
                        <a href="{{ route('threads.create') }}" class="bg-green-500 text-white text-2xl py-3 px-7 hover:bg-green-400 transition-all rounded-lg">Create Thread</a>
                    @endif
                    </div>
                    @if ($category->threads->count() == 0)
                        <h3 class="text-3xl mt-20 mb-5">There are no threads</h3>
                    @else
                            <div class="flex mt-5 pb-10 justify-self-start" >
                                
                            </div>


                        <table id="thread-table" class="w-10/12 mb-10">
                            <tr class="text-white text-3xl text-center bg-blue-400">
                                <th class="py-2 pl-5 text-left">
                                    Topic
                                    <a href="
                                    @if(Request::getRequestUri() == '/category/{{ $category->id }}?sort=asc')
                                        /category/{{$category->id}}?sort=desc
                                        @else
                                        /category/{{$category->id}}?sort=asc
                                            @endif">
                                        <img src="/storage/assets/arrow-point-to-down.png"/></a>

                                </th>
                                <th class="">
                                    Comments
                                </th>
                                <th class="">
                                    Latest post
                                </th>
                            </tr>
                            @foreach($category->threads as $thread)
                            <tr class="w-96 border-black border-b bg-gray-200 ">
                                <td class="pl-5 pb-4">
                                    <a class="link-text" href="/threads/{{ $thread->id }}"><h3 class="text-2xl max-w-md mt-16 mb-5">{{ $thread->title }}</h3></a>
                                    <h4>By <a class="link-text" href="/profile/{{ $thread->user->id }}">{{ $thread->user->username }}</a></h4>
                                    <p class="text-gray-400 mb-16">{{ \Carbon\Carbon::parse($thread->created_at)->diffForHumans() }}</p>
                                </td>

                                <td class="text-center text-2xl">
                                    {{ $thread->comments->count() }}
                                </td>
                                <td class="text-center">
                                    @if($thread->comments->count() === 0)
                                        By <a class="link-text" href="/profile/{{ $thread->user->id }}">{{ $thread->user->username }}</a><br>
                                        {{ \Carbon\Carbon::parse($thread->created_at)->diffForHumans() }}
                                        @else

                                            By <a class="link-text" href="/profile/{{ $thread->latestComment->user->id }}">{{ $thread->latestComment->user->username }}</a><br>
                                       {{ \Carbon\Carbon::parse($thread->latestComment->created_at)->diffForHumans() }}

                                       @endif
                                        
                                </td>
                            </tr>


                            @endforeach
                        </table>


@endif




            </div>
        </div>
    </div>

@endsection
