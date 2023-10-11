<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>
<div class="container mt-3 p-3 my-3 bg-success text-white">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="input-group mb-3">
                    @if(request()->has('id'))
                        <form method="POST" action="{{route('updateTodo', request()->has('id'))}}">
                            @method('put')
                            @csrf
                            <input type="text" value="{{request()->todo}}" name="todo" class="form-control" placeholder="Enter Your Memo Here...." aria-label="Recipient's username" aria-describedby="button-addon2">
                            <input type="hidden" name="id" value="{{request()->id}}">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">UPDATE</button>
                        </form>
                    @else
                        <form method="POST" action="{{route('addTodo')}}">
                            @csrf
                            <input type="text" value="{{request()->todo}}" name="todo" class="form-control" placeholder="Enter Your Memo Here...." aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Add</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
        @if(\Session::has('success'))
            <div class="alert alert-success">{!! \Session::get('success') !!}</div>
        @endif
    </div>
    <div class="container-fluid mt-2 bg-primary.bg-gradient">
        <div class="card">
            <div class="card-body">
                @foreach($todoAllData as $todoData)
                    <ul class="list-group">
                        <li class="list-group-item">{{$todoData->todo}}</li>
                                <span class="badge rounded-pill">
                            <a
                                href="{{route('zihad', ['todo'=>$todoData->todo, 'id'=>$todoData->id])}}"
                                class="btn btn btn-secondary btn-sm"
                            >Edit
                            </a>
                            <a
                                href="#"
                                onclick="event.preventDefault();document.getElementById('delete-to').submit();"
                                class="btn btn btn-danger btn-sm"
                            >Delete
                            </a>
                            <form id="delete-to" action="{{route('deleteTodo', $todoData->id)}}" method="POST" class="d-none">
                                @method('delete')
                                @csrf
                            </form>
                        </span>
                    </ul>
                @endforeach
            </div>
        </div>
    </div>
</div>

</body>
<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</html>
