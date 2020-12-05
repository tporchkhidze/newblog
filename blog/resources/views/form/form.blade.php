@extends('../layout.layout')
@section('content')
    <style>
        input {
            border: 2px solid red;
            margin: 20px;
            border-radius: 10px;
        }
        .container{
            margin-left: 50px;
        }
        .title{
            margin-left: 50px;
        }
        .box-footer{
            margin-left: 50px;
        }
    </style>

    <h1 class="title">
        CREATE POST
    </h1>

    <form action="{{route('posts.save')}}" method="POST" enctype="multipart/form-data" >
        <div class="container">
            <div>
                <label for="exampleInputEmail1">Post Title</label>
                <input type="name" class="form-control" name="title" required>
            </div>

            <div>
                <label for="exampleInputEmail1">Post Text</label>
                <input type="name" class="form-control" name="body" required>
            </div>
            <div>
                <label for="exampleInputEmail1">Post Likes</label>
                <input type="name" class="form-control" name="post_likes" required>
            </div>
        </div>
        <div class="box-footer">
            <button type="submit">Submit</button>
        </div>
    </form>


@endsection()
