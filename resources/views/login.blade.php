@extends('layouts.app')

@section('content')
    <div class="min-vh-100 d-flex justify-content-center align-items-center">
        <form action="/signin" method="POST" style="width:400px">
            
            @csrf

            <h1 class="text-center">Login</h1>

            <input class="form-control mb-3 mt-2" name="email" placeholder="Email" type="text">

            <input class="form-control mb-3" name="password" placeholder="Senha" type="password">

            <button class="btn btn-outline-primary w-100 mb-3" type="submit">Entrar</button>

            <a href="/register" class="link-secundary content-center">Cadastro</a>
        </form>
    </div>
@endsection