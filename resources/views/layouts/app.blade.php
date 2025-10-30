<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Treino</title>

    {{-- ⚡ IMPORTAÇÃO DO BOOTSTRAP CSS (Se você não estiver usando o Vite para ele) --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet">
    
    {{-- ⚡ IMPORTAÇÃO DO VITE CSS (Seu app.css) ⚡ --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- ⚡ ONDE OS ESTILOS INJETADOS VÃO (Para o CSS do z-index) ⚡ --}}
    @stack('styles') 
</head>

{{-- Adicione 'min-vh-100' aqui para garantir que o corpo tenha altura total (bom para layouts fixos) --}}
<body>
    
    {{-- SUA NAVBAR --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-3">
        <div class="container-fluid">
            
            {{-- SEU ÍCONE COMO LINK PARA INÍCIO --}}
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ Vite::asset('resources/img/icone.png') }}" 
                     alt="Página Inicial"
                     style="height: 32px;"
                >
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @auth
                        <li class="nav-item"><a href="/" class='nav-link active' aria-current="page">Início</a></li>
                        <li class="nav-item"><a href="{{ route('trainings.index') }}" class='nav-link'>Lista de treino</a></li>
                        <li class="nav-item"><a href="{{ route('trainings.create') }}" class='nav-link'>Cadastrar Treino</a></li>
                    @endauth
                </ul>
            
                <div class="d-flex ms-auto">
                    @guest
                        <a href="{{ route('loginForm') }}" class="btn btn-outline-light me-2">Login</a>
                        <a href="{{ route('viewForm') }}" class="btn btn-success">Criar usuário</a>
                    @endguest

                    @auth
                        <form action="{{route('logout')}}" method="POST"> 
                            @csrf
                            <button type="submit" class="btn btn-outline-danger">Sair</button>
                        </form>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
    
    {{-- ⚡ CONTEÚDO PRINCIPAL (Aqui o @yield('content') fica no corpo) ⚡ --}}
    <div class="main-content">
        @yield('content')
    </div>


    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>