@extends('layouts.app')

{{-- Remova a classe de fundo do body no layout, se ainda existir --}}

@section('content')

  
    {{-- 1. CAMADA DO VÍDEO (Vai para o fundo) --}}
    <div class="video-background">
        <video autoplay muted loop id="bgVideo">
            <source src="{{ asset('videos/background.mp4') }}" type="video/mp4"> 
        </video>
    </div>

    {{-- 2. CAMADA DO CONTEÚDO (content-wrapper) --}}
    {{-- Esta div garante que o formulário fique por cima do vídeo --}}
    <div class="content-wrapper">
        
        {{-- SEU CÓDIGO DE CENTRALIZAÇÃO VEM AQUI DENTRO --}}
        <div class="d-flex justify-content-center align-items-center min-vh-100">

            <div class="login-card" style="max-width: 400px; width: 100%;">
                
                <h1>Login</h1> 

                @if ($errors->any())
                <div class="alert alert-danger mb-4">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{route('login')}}" method="post">
                @csrf    
                    <div class="mb-3">
                        <label for="email" class="form-label">Email cadastrado:</label>
                        <input type="email" name="email" id="email" placeholder="Seu email" class="form-control" autocomplete="email">
                    </div>

                    <div class="mb-3">
                        {{-- Campo falso para evitar preenchimento automático do navegador --}}
                        <input style="display:none" type="password" name="fakepasswordignore" autocomplete="off">
                        
                        <label for="password" class="form-label">Senha:</label>
                        <input type="password" 
                               name="password" 
                               id="password" 
                               placeholder="Sua senha"
                               class="form-control" 
                               autocomplete="off">
                    </div>
                    
                    <div class="mb-3">
                        <input type="submit" class="btn btn-primary w-100" value="Entrar">
                    </div>
                    
                    <hr>

                    <p class="text-center mb-0">Não tem conta?</p>
                    <div class="text-center">
                        <a href="{{ route('viewForm') }}" class="btn btn-sm btn-outline-secondary mt-2">Criar Usuário</a>
                    </div>
                </form>

            </div>
        </div>
    </div> {{-- FIM DE content-wrapper --}}

@endsection