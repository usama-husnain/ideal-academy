<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="https://cdn.tiny.cloud/1/cvwprdb1l65sj4dkwbvwk7c3fli0dpqevrhzyttdbou6w1ox/tinymce/5/tinymce.min.js"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm printtohide">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="row">
                <div id="sidebar" class="col-xl-2 col-md-3 printtohide">
                    <div class="card bg-light">
                        <div class="card-body">
                            <ul class="nav d-block" style="height:500px; overflow-y:auto">
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="{{route("home")}}">
                                        <i class="fa fa-dashboard"></i> Dashboard
                                    </a>
                                </li>
                                <li class="nav-item">
                                   <a class="nav-link text-dark" href="{{route("students.index")}}">
                                        <i class="fa fa-users"></i> Student
                                    </a>
                                </li>
                                <li class="nav-item">
                                   <a class="nav-link text-dark" href="{{route("question.index")}}">
                                        <i class="fa fa-edit"></i> Question
                                    </a>
                                </li>
                                <li class="nav-item">
                                   <a class="nav-link text-dark" href="{{route("test.index")}}">
                                        <i class="fa fa-list"></i> Test
                                    </a>
                                </li>
                                <li class="nav-item">
                                   <a class="nav-link text-dark" href="{{route("notes.index")}}">
                                        <i class="fa fa-sticky-note-o"></i> Notes
                                    </a>
                                </li>
                                <li class="nav-item">
                                   <a class="nav-link text-dark" href="/fee">
                                        <i class="fa fa-money"></i> Fee Structure
                                    </a>
                                </li>
                                <li class="nav-item">
                                   <a class="nav-link text-dark" href="/fee/collection">
                                        <i class="fa fa-money"></i> Fee Collection
                                    </a>
                                </li>
                                <li class="nav-item">
                                   <a class="nav-link text-dark" href="/setting">
                                        <i class="fa fa-cog"></i> Settings
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-10 col-md-9">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </div>
            </div>

        </main>
    </div>


    @yield('scripts')
    <script>
        tinymce.init({

          selector: 'textarea',
          plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
          toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
          tinycomments_mode: 'embedded',
          tinycomments_author: 'Author name',
        });
      </script>
</body>
</html>
