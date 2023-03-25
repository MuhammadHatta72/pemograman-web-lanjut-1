@extends('layout')
@section('content')
<div class="container">
<table class="table table-bordered">
<thead>
<tr>
<th>No</th>
<th>Title</th>
<th>Content</th>
<th>Image</th>
<th>Action</th>
</tr>
</thead>
<tbody>
@foreach($articles as $article)
<tr>
<td>{{$loop->iteration}}</td>
<td>{{$article->title}}</td>
<td>{{$article->content}}</td>
<td><img width="150px" src="{{asset('storage/'.$article->featured_image)}}"></td>
<td>
<a href="/articles/{{$article->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
<form action="/articles/{{$article->id}}" method="post" class="d-inline">
@method('delete')
@csrf
<button type="submit" class="btn btn-danger btn-sm">Delete</button>
</form>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
@endsection