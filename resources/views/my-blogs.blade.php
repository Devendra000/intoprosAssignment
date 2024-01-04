<!DOCTYPE html>
<html lang="en">
<head>
    <title>Your Blogs</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/message.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    @include('layout/message')
  
    @include('layout/navbar')
<div class="container mt-3">          
    <table class="table table-dark table-hover">
        <thead>
            <th>SN</th>
            <th>Title</th>
            <th>Image</th>
            <th>Description</th>
            <th>Action</th>
        </thead>
        @forelse($blogs as $blog)
        <tbody>
            <td>{{$loop->iteration}}</td>
            <td>{{$blog->title}}</td>
            <td><img src='{{$blog->image}}' width='100px' height='100px'></td>
            <td>{{$blog->description}}</td>
            <td><a href="{{route('showEdit',['id'=>$blog->id])}}">EDIT </a><br><a href="{{route('deleteBlogs',['id'=>$blog->id])}}"> DELETE</a></td>
        </tbody>
        @empty
            <td colspan='5'>No blog to show</td>
        @endforelse
    </table>
</div>

</body>
</html>
