<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <title>Document</title>
</head>
<body class="bg-light">
    <div class="container">
        <h1 class="text-center text-secondary">
            Your Comments
        </h1>
        <hr>

        <a href="{{route('comment.index')}}" class="text-decoration-none my-2">Back to Comments</a>
        <div class="ps-3">

                <h2>
                    {{$comment->name}}
                </h2>
                <p>
                Theme: {{$comment->theme}}
                </p>
                <p>
                    Comment: {{$comment->comment}}
                </p>
                <p>
                    Pages: {{$comment->pages}}
                </p>
                <p>
                    Updated at {{$comment->updated_at->format('d/m/Y')}}
                </p>

        </div>
    </div>
</body>
</html>