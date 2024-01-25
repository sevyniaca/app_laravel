<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account List</title>
    @include('components.metaData')
</head>
<body>
    

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <h2 class="card-title text-center mb-4">Login</h2>
          <form action="" method="POST" id="loginForm" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 " id="alerts">
           
            </div>
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" id="username" name="username" required>
          
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" required>
          
            </div>
            <div class="d-grid gap-2">
              <button type="submit" class="btn btn-primary btn-block">Login</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@include('components.scripts')
<script src="{{ asset('actions/js/main.js') }}"></script>
<script src="{{ asset('actions/js/login.js') }}"></script>

</body>
</html>