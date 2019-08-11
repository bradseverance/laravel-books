<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="{{ route('admin.index') }}">Books Admin</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.books') }}">List Books</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.newBook') }}">Create New Book</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('other.welcome') }}">Logout</a>
      </li>
    </ul>
  </div>
</nav>