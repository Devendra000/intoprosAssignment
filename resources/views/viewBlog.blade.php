<!DOCTYPE html>
<html lang="en">
<head>
  <title>Blog</title>
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
    <h2>Create blog</h2>
    <form action="/blogCreate" method='post' enctype='multipart/form-data'>
      @csrf
      <div class="mb-3 mt-3">
        <label for="email">Title:</label>
        <input type="text" class="form-control" id="email" placeholder="Enter Title" name="title">
      </div>
      <div class="mb-3">
        <label for="pwd">Content:</label>
        <textarea rows='5' class="form-control" id="pwd" placeholder="Blog content here" name="description"></textarea>
      </div>

      <div class="mb-3">
        <input type='file' class="form-control" id="file" accept='image/*' name="image">
    </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

</body>
</html>
