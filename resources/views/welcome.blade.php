<!DOCTYPE html>
<html lang="en">
<head>
    <script
        src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <a href="{{ url('create')}}" class="btn btn-sm">add</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>nama</th>
                <th>hp</th>
                <th>id</th>
            </tr>
            <TBody>
                @foreach ($jamesdata as $jabes)
                <tr>
                    <td>{{ $jabes->name }}</td>
                    <td>{{ $jabes->hp }}</td>
                    <td>{{ $jabes->id }}</td>
                    <td>
                        <a href="/view/{{ $jabes->id }}" title="view"><button class="btn btn-sm"><i  aria-hidden="true"></i>view</button></a>
                        <a href="/update/{{ $jabes->id }}" title="edit"><button class="btn btn-sm"><i  aria-hidden="true"></i>edit</button></a>
                        <a href="/delete/{{ $jabes->id }}" title="delete"><button class="btn btn-sm"><i  aria-hidden="true"></i>delete</button></a>
                    </td>
                </tr>
                @endforeach
            </TBody>
        </thead>
    </table>
</body>
</html>
