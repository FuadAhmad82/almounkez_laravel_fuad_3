<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Al Mounkez Training</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 10 CRUD Example Al Mounkez</h2><br>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('posts.create') }}"> Create Post </a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>post Name</th>
            <th>post body</th>

            <th width="280px">Action</th>
        </tr>
        @foreach ($posts as $post)
            <tr>
                <td>{{$post->id }}</td>
                <td>{{$post->title }}</td>
                <td>{{$post->body }}</td>

                <td>
                    <form action="{{ route('posts.destroy',$post->id) }}" method="Post">
                        <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

</body>
</html>
