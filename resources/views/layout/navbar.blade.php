
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{route('viewBlog')}}">Create a new blog</a><br>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{route('showBlogs')}}">Show all blogs</a><br>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('myBlogs')}}">Show your blogs</a><br>
        </li>
        <li style='float:right'>
          <a class="nav-link" href="{{route('logout')}}">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
