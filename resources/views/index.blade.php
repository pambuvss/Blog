@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>All posts</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Title</th>
        @if (Auth::user() && Auth::user()->isAdmin())
        <th colspan="2">Action</th>
        @endif
      </tr>
    </thead>
    <tbody>

      @foreach($posts as $post)
      <tr>
        <td>{{$post['id']}}</td>
        <td><a href="{{action('PostController@show', $post['id'])}}">{{$post['title']}}</a></td>
        
        @if (Auth::user() &&  Auth::user()->isAdmin())
        <td><a href="{{action('PostController@edit', $post['id'])}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{action('PostController@destroy', $post['id'])}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endif
      @endforeach
    </tbody>
  </table>
  {{$posts->links()}}
  </div>
  </body>
</html>
@endsection