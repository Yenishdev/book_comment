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
            All Comments
        </h1>
        <hr>

        <a href="{{route('comment.create')}}" class="btn btn-success my-2 rounded-2">+ Add New Comment</a>

        <div class="ps-3">
            @foreach($comments as $comment)
                <h2>
                    <a href="{{route('comment.show', $comment->id)}}">
                        {{$comment->name}}
                    </a>
                </h2>
                <p>
                    Comment: {{$comment->comment}}
                </p>
                <p>
                    Updated at {{$comment->updated_at->format('d/m/Y')}}
                </p>
            <div>
                <a href="{{route('comment.edit', $comment->id)}}" class="btn btn-primary my-2 rounded-2">Edit</a>
                <form action="{{route('comment.destroy', $comment->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </div>

                @endforeach
        </div>
    </div>
</body>
</html>