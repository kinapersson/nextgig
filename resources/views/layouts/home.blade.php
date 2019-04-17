<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Exjobb') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
</head>
<body>
    <div id="app">

        <nav class="navbar navbar-expand-md">
            <div class="container">  
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
  
          {{-- <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
              <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
            </form> --}}
  
                  <!-- Right Side Of Navbar -->
                  <ul class="navbar-nav ml-auto">
                      <ul class="navbar-nav mr-auto">
                          <li class="nav-item">
                              <a class="nav-link" href="/spelningar">Hitta spelningar<span class="sr-only">(current)</span></a>
                          </li>
                          <li class="nav-item">
                                <a class="nav-link" href="/min-lista">Sparade spelningar<span class="sr-only">(current)</span></a>
                            </li>
                      </ul>
                      {{-- <ul class="nav navbar-nav navbar-right">
                          <li class="nav-item">
                              <a class="nav-link" href="/spelningar/create">Lägg till spelning<span class="sr-only">(current)</span></a>
                          </li>
                      </ul> --}}
  
                      <!-- Authentication Links -->
                      @guest
                      
                          <li class="nav-item">
                              
                              <a class="nav-link login-link" href="{{ route('login') }}">{{ __('Logga in') }}</a>
                          </li>
                          @if (Route::has('register'))
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('register') }}">{{ __('Registrera dig') }}</a>
                              </li>
                          @endif
                        
                          @else
                              <li class="nav-item dropdown">
                                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                   </a>
  
                                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                  
                                      <a class="dropdown-item" href="/dashboard">Kontrollpanel</a>

                                      <a class="dropdown-item" href="/spelningar/create">Lägg till spelning<span class="sr-only">(current)</span></a>
                                      
                                      <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                                             {{ __('Logga ut') }}
                                    </a>
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      @csrf
                                  </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="">
            
               
                @include('inc.messages')
                @yield('content')
        
         
        </main>

        @include('inc.footer')

    </div>

        {{-- Text-editor för textarea i formulär --}}
        {{-- <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
        <script>
            CKEDITOR.replace( 'article-ckeditor' );
        </script> --}}
</body>
</html>