<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sport Fanatico</title>
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
        }
    </style>
    @yield('styles')

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>

<body>
    @include('sweetalert::alert')
    <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <span class="fs-4">Sport Fanatico</span>
            </a>

            <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link" href="/post">News</a></li>
                <li class="nav-item"><a class="nav-link" href="/match">Match</a></li>
                <li class="nav-item"><a class="nav-link" href="/team">Team</a></li>
                <li class="nav-item"><a class="nav-link" href="/player">Player</a></li>
                <a href="/dashboard"><button type="button" class="btn btn-primary">Dashboard</button></a>
            </ul>
        </header>
    </div>

    <div class="container">
        @yield('content')
    </div>

    <footer class="mt-3 py-3 bg-light">
        <div class="container">
            <span class="text-muted">2022 &copy; Sport Fanatico Labs 
                @role('admin')                                    
                    <a href="/admin/token">Token</a> | 
                    <a href="/admin/user">User</a> 
                @endrole
            </span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">    

    </script>
    @yield('scripts')
</body>

</html>
