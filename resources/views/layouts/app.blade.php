<!DOCTYPE html>
<html
    lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">
    <meta name="csrf-token"
          content="{{ csrf_token() }}">

    <title>Oskar Forums</title>

    <!-- Fonts -->
    <link rel="preconnect"
          href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Titillium+Web&display=swap"
        rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet"
          href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"
            defer></script>

    <!-- jQuery -->
    <script
        src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous"></script>
</head>
<body>

<div class="min-h-screen bg-gray-100">


    <!-- Page Heading -->
    <header class="bg-white shadow-md">

        <a href="/">
            <img class="ml-6 w-20"
                 src="{{ asset('/favicon.ico') }}">
            <h2 class="ml-6">Oskar Forums</h2>
        </a>

            <div
                class="max-w-7xl mx-auto   sm:px-6 lg:px-8">

                <nav
                    class="w-40 flex justify-center top-2 right-4 absolute float-right hover:bg-opacity-0 transition-all">
                    @if (Route::has('login'))
                        <div
                            class="top-0 right-0 px-6 py-4 inline-flex">
                            @auth
                                <a class="dropdown-item px-5"
                                   href="/profile/{{Auth::user()->id}}
                                       ">
                                    Profile
                                </a>
                                <form
                                    method="POST"
                                    action="{{ route('logout') }}">
                                    @csrf

                                    <button
                                        class="outline-none"
                                        type="submit"
                                        href="{{route('logout')}}">

                                        {{ __('Logout') }}</button>


                                </form>
                            @else
                                <a href="{{ route('login') }}"
                                   class="text-sm text-gray-700 underline">Login</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                       class="ml-4 text-sm text-gray-700 underline">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </nav>
            </div>
    </header>

    <!-- Page Content -->
    <main>
        @yield('content')
    </main>
</div>
</body>
</html>
