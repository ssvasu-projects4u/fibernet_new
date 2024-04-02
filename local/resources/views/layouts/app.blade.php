<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SLJ Fiber Networks') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('assets/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('assets/img/logo.png')}}" class="img-fluid rounded" title="{{ config('app.name', 'SLJ Fiber Works') }}" alt="{{ config('app.name', 'SLJ Fiber Works') }}" width="200">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                   {{ __('Login') }} <span class="caret"></span>
								</a>
								
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="{{ url('login') }}">
                                        {{ ('Login') }}
                                    </a>
									<a class="dropdown-item" href="{{ url('customer/login') }}">
                                        {{ ('Customer Login') }}
                                    </a>
									<a class="dropdown-item" href="{{ url('franchise/login') }}">
                                        {{ ('Franchise Login') }}
                                    </a>
									<a class="dropdown-item" href="{{ url('branch/login') }}">
                                        {{ ('Branch Login') }}
                                    </a>
									<a class="dropdown-item" href="{{ url('distributor/login') }}">
                                        {{ ('Distributor Login') }}
                                    </a>
								</div>
							</li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                   Hi, {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @role('superadmin')
                                    <a class="dropdown-item" href="{{ url('admin/dashboard') }}">
                                        {{ ('Dashboard') }}
                                    </a>
                                      @elserole('Area Tech Incharge')
                                    <a class="dropdown-item" href="{{ url('admin/dashboard') }}">
                                        {{ ('Dashboard') }}
                                    </a>
                                  
                                    @elserole('franchise')
                                    <a class="dropdown-item" href="{{ url('franchise/dashboard') }}">
                                        {{ ('Dashboard') }}
                                    </a>
                                    @elserole('distributor')
                                    <a class="dropdown-item" href="{{ url('distributor/dashboard') }}">
                                        {{ ('Dashboard') }}
                                    </a>
									@elserole('branch')
                                    <a class="dropdown-item" href="{{ url('branch/dashboard') }}">
                                        {{ ('Dashboard') }}
                                    </a>
                                    @elserole('customer')
                                    <a class="dropdown-item" href="{{ url('customer/dashboard')}}">
									  <i class="fas fa-fw fa-tachometer-alt"></i>
									  <span>Dashboard</span></a>
								  <a class="dropdown-item" href="{{ url('customer/profile')}}">
									  <i class="fas fa-fw fa-user-circle"></i>
									  <span>My Profile</span></a>
								  <a class="dropdown-item" href="{{url('customer/pay-online')}}">
									  <i class="far fa-credit-card"></i>
									  <span>Online Pay Bill</span></a>
								  <a class="dropdown-item" href="{{ url('customer/payment-history')}}">
									  <i class="fas fa-history"></i>
									  <span>Payment History</span></a>
								  
								  
                                    @endrole
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
