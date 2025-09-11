<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Treino</title>

    <!-- Bootstrap CSS via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet">

</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-3">
    <div class="navbar-collapse collapse navbar-nav">
        @auth
        <ul class="navbar-nav me-auto">
            <a href="{{ route('loginForm') }}" class='navbar-brand'>Lista de treino</a>
            <li class="nav-item">
                <a href="{{ route('create') }}" class='navbar-brand'>Cadastrar Treino</a>
            </li>
        @endauth
        @guest
            <li>
                <a href="{{ route('loginForm') }}" class="navbar-brand">Login</a>
            </li>
            <li>
                <a href="{{ route('viewForm') }}" class="navbar-brand">Criar usuário </a>
            </li>
        @endguest
       </ul> 
    </div>
</nav>
    <div class="container mt-5">
        @yield('content')
    </div>
</body>
</html>