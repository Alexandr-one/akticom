<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h3> Products </h3>
    <div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Код</th>
            <th scope="col">Наименование</th>
            <th scope="col">Уровень1</th>
            <th scope="col">Уровень2</th>
            <th scope="col">Уровень3</th>
            <th scope="col">Цена</th>
            <th scope="col">ЦенаСП</th>
            <th scope="col">Количество</th>
            <th scope="col">Поля свойств</th>
            <th scope="col">Совместные покупки</th>
            <th scope="col">Единица измерения</th>
            <th scope="col">Картинка</th>
            <th scope="col">Выводить на главной</th>
            <th scope="col">Описание</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
        <tr>
            @foreach(\App\Classes\ProductEnum::lists() as $item)
            <th>{{ $product[$item] }}</th>
            @endforeach
        </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    <div class="mt-2">
        {{ $products->appends($_GET)->links() }}

    </div>
</div>
</body>
</html>

