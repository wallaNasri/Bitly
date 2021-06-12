<!DOCTYPE html>
<html>
<head>
  
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
</head>
<body>
<header class="py-2 bg-info text-white mb-4">
        <div class="container">
            <div class="d-flex">
                <h1 class="h3">{{config('app.name')}}</h1>
                @auth
                <div class="ms-auto">
                    Hi, {{Auth::user()->name}}
                    <a href="#" onclick="document.getElementById('logout').submit()">Logout</a>
                    <form id="logout" class="d-none" action="{{route('logout')}} " method="POST">
                    @csrf
                    </form>
                </div>
                @endauth
            </div>
        </div>
    </header>
@yield('content')
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

</body>
</html>