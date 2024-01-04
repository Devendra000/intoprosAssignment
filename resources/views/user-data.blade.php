<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All users</title>  
    <link rel="stylesheet" href="{{asset('css/message.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container mt-3">
    <h2>User Data</h2>
      
    <div class="container mt-3">          
    <table class="table table-dark table-hover">
        <thead>
            <th>User</th>
            <th>Role</th>
        </thead>
        @foreach($users as $user)
        <tbody>
            <td>{{$user->name}}</td>
            <td>
            @forelse($user->roles as $role)
                {{$role->name}}
            @empty
                Not assigned
            @endforelse
            </td>
        </tbody>
        @endforeach
    </table>
    </div>
  </div>
</body>
</html>
