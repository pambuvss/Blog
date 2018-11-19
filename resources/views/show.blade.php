<!-- edit.blade.php -->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Show post </title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
    <h1>{{$post->title}}</h1>
        <p><img class="img-responsive img-thumbnail" src="{{URL::asset('/images/'.$post->filename)}}" style="width: 300px; float: left; padding-left: 10px; padding-bottom: 10px; padding-right: 15px;">
        {{$post->text}}</p>
</div>
  </body>
</html>