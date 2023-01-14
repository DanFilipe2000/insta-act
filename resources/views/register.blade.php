@extends('layouts.app')

@section('content')
    <div class="min-vh-100 d-flex justify-content-center align-items-center">
        <form action="/signup" method="POST" style="width:400px">
            
            @csrf

            <h1 class="text-center">Cadastro</h1>

            <input class="form-control my-3" name="name" placeholder="Nome" type="text">

            <input class="form-control mb-3" name="email" placeholder="Email" type="text">

            <input class="form-control mb-3" name="password" placeholder="Senha" type="password">

            <button class="btn btn-outline-primary w-100 mb-3" type="submit">Entrar</button>

            <a href="/login" class="link-secundary">Login</a>
        </form>
    </div>
@endsection