<?php /** @var \App\Models\Painting[] $paintings */ // Модель и её поля ?>
<!DOCTYPE html>
<html lang='ru'>
<head>
    <meta charset="utf-8">
    <meta name='viewport' content='width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="keywords" content="картинная галерея, галерея, художники, картины">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Zilla+Slab'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel='stylesheet' href='{{asset('public/css/style.css')}}'>
    <title>Картинная галерея</title>
</head>
<body>
<header>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a href="" class="navbar-brand d-flex align-items-center">
                <strong>Картинная галерея</strong>
            </a>
        </div>
    </div>
</header>
<main>

    <section class="py-5 text-center" style="background-image:url('public/обои.jpg'); background-position:center center;">
        <div class="container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light text-white">Добро пожаловать!</h1>
                    <p class="lead text-light">Насладитесь искусством за чашечкой чая)</p>
                </div>
            </div>
        </div>
    </section>

    <div class="album py-5 bg-dark">
        <div class="container">
            <div class="text-center">
                <button type="button" class="btn btn-sm btn-outline-light">Добавить картину</button>
            </div>
            <br>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <div class="col">
                    <div class="card shadow-sm">
                        @forelse($paintings as $painting)
                        <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url(\App\Models\Painting::FILE_DIR . $painting->preview) }}" role="img" aria-label="Placeholder: Thumbnail"><rect width="100%" height="100%" fill="#55595c"></rect>
                        <div class="card-body">
                            <div class="card-text">
                                <div class="row">
                                    <p class="col text-center">{{ $painting->title}}</p>
                                </div>
                                <div class="row">
                                    <p class="col">{{ $painting->author->name }}</p>
                                    <p class="col text-right">{{ $painting->creation_date}}</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-danger">Удалить</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Редактировать</button>
                                </div>
                            </div>
                        </div>
                        @empty
                            <tr>
                                <th colspan="4">Список пуст</th>
                            </tr>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

<footer class="text-light py-5 bg-secondary">
    <div class="container">
        <p class="float-end mb-1">
            <a href="">Наверх</a>
        </p>
        <p class="mb-1">Сделано Данильченко Валерией</p>
        <p class="mb-0">В рамках курсового проекта</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

