@extends('layouts.app')

@section('title')
    Авторизация
@endsection

@section('content')
    <br>
    <br>
    <br>
    <div class="container">
        <div class="col col-md-6 offset-3">
            <form method="post" action="{{ route('user.signin') }}">
                @csrf
                @method('post')

                <div class="form-group">
                    <label for="exampleInputLogin">Логин</label>
                    <input type="text" name="login" class="form-control @error('login') is-invalid @enderror" id="exampleInputLogin" aria-describedby="emailHelp">

                    @error('login')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Пароль</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1">

                    @error('login')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-dark float-right"><i class="fas fa-sign-in-alt"></i>Войти</button>
            </form>
        </div>
    </div>
@endsection
