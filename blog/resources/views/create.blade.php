@extends('layout.layout')
@section('content')
    <style>
        input {
            border: 2px solid #2200ff;
            margin: 5px;
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
        .error-container{
            margin-block-start: 0;
            font-size: 15px;
            color: red;
            font-family: monospace;
        }
        button{
            width: 100px;height: 34px;font-size: 18px;border-radius: 10px; border: 2px solid #2200ff;
        }
    </style>

    <h1 class="title">
        CREATE POST
    </h1>


{{--@if($errors->any())--}}

{{--    @foreach($errors->all() as $error)--}}
{{--        <li>{{$error}}</li>--}}
{{--    @endforeach--}}
{{--@endif--}}
<form action="{{route('posts.save')}}" method="post" enctype="multipart/form-data" >
    <div class="container">
        <div style="height: 70px;">
            <label for="exampleInputEmail1">Post Title</label>
            <input type="name" class="form-control @error('title') is-invalid @enderror" name="title">
            @error('title')
            <p class="error-container">{{$errors->first('title')}}</p>
            @enderror
        </div>

        <div style="height: 70px;">
            <label for="exampleInputEmail1">Post Text</label>
            <input type="name" class="form-control @error('text') is-invalid @enderror" name="body">
            @error('text')
            <p class="error-container">{{$errors->first('text')}}</p>
            @enderror
        </div>
        <div style="height: 70px;">
            <label for="exampleInputEmail1">Post Likes</label>
            <input type="name" class="form-control @error('likes') is-invalid @enderror" name="post_likes">
            @error('likes')
            <p class="error-container">{{$errors->first('likes')}}</p>
            @enderror
        </div>

        <div style="height: 70px;">
            <label for="exampleInputEmail1">Tags</label>
            <select name="tags[]" id="" multiple>
                @foreach($tags as $tag)
                <option value="{{$tag->id}}">{{$tag->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    @csrf
    <div class="box-footer">
        <button type="submit">Submit</button>
    </div>
</form>


@endsection()
