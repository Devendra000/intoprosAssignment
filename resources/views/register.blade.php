<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset('css/message.css')}}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    a{
        text-decoration:none;
        color:green;
    }
  </style>
</head>

<body>

<div class="container mt-3">
  <h2>Register</h2>
  @include('layout/message')
  <form action="/register" method='post'>
    @csrf
    <div class="mb-3 mt-3">
      <label for="name">Name:</label>
      <input type="name" class="form-control" id="name" placeholder="Enter name" name="name">
    </div>
    <div class="mb-3 mt-3">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="mb-3">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
    </div>

    <select class="form-select" id="sel1" name="role">
      @foreach($roles as $role)
        <option value="{{$role->id}}" name="role">{{$role->id}}.{{$role->name}}</option>
      @endforeach
    </select>
   <br>
    <button type="submit" class="btn btn-primary">Submit</button><br>
    Already a member? <a href="{{route('login')}}">LOGIN</a>
  </form>
</div>

</body>
</html>
