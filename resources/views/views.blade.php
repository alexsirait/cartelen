<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @foreach ($viiew as $a)
        <p>nama: {{$a->name}}</p>
        <p>hp:{{$a->hp}}</p>
        <p>id:{{$a->id}}</p>
    @endforeach
</body>
</html>
