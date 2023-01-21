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
            Create New Comment
        </h1>
        <hr>
        <div class="my-2">
            @if($errors->any())
                <div class="border border-danger">
                    <div class="bg-danger ps-3">
                        Something went wrong
                    </div>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>
                                {{$error}}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="ps-3">
            <form
                    action="{{route('comment.update', $comment->id)}}"
                    method="POST"
                    enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="my-2 bg-grey-lighter">
                    <div class="my-2">
                        <label for="name" class="mx-1">Name of Book:</label>
                        <input type="text" name="name"  value="{{$comment->name}}">
                    </div>
                    <div class="my-2">
                        <label for="theme" class="mx-1 ">Theme of Book:</label>
                        <input type="text" name="theme"  value="{{$comment->theme}}">
                    </div>
                    <div class="my-2 ps-5">

                        <textarea name="comment" id="" cols="50" rows="5"  class="ms-5">{{$comment->comment}}</textarea>
                    </div>
                    <div class="my-2">
                        <label for="pages" class="mx-1">Pages:</label>
                        <input type="number" name="pages" placeholder="How many Pages" value="{{$comment->pages}}">
                    </div>
                    <div >
                        <label class="w-44 flex flex-col items-center px-2 py-3 bg-white-rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer">
                                <span class="mt-2 text-base leading-normal">
                                    Select a file
                                </span>
                            <input
                                    type="file"
                                    name="image"
                                    class="hidden">
                        </label>
                    </div>

                </div>

                <button type="submit" class="btn btn-primary rounded-pill mt-2">Post the Comment</button>

            </form>
        </div>
    </div>
</body>
</html>