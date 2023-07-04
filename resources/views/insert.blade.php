<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand">Register</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="/"><a href="/">Home</a></li>
      <li><a href="loginpage">Login</a></li>
    </ul>
  </div>
</nav>

<div class="container">
  <form action="{{route('usersignup')}}" method="POST">
    @csrf
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
    </div>
    <div class="form-group">
      <label for="email">Age:</label>
      <input type="age" class="form-control" id="age" name="age" placeholder="Enter your age">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

<footer class="bg-light text-center text-lg-start">
  <!-- Grid container -->
  <div class="container p-4">
    <!--Grid row-->
    <div class="row">
      <!--Grid column-->
      <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
        <h5 class="text-uppercase">Footer text</h5>

        <p>
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste atque ea quis
          molestias. Fugiat pariatur maxime quis culpa corporis vitae repudiandae
          aliquam voluptatem veniam, est atque cumque eum delectus sint!
        </p>
      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
        <h5 class="text-uppercase">Footer text</h5>

        <p>
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste atque ea quis
          molestias. Fugiat pariatur maxime quis culpa corporis vitae repudiandae
          aliquam voluptatem veniam, est atque cumque eum delectus sint!
        </p>
      </div>
      <!--Grid column-->
    </div>
    <!--Grid row-->
  </div>
  <!-- Grid container -->

  <!-- Footer -->
  <footer class="text-center p-3" style="background-color: #f8f9fa;">
    &copy; 2023 Your Company. All rights reserved.
  </footer>
  <!-- Footer -->
</footer>

<style>
  body {
    min-height: 100vh;
    display: flex;
    flex-direction: column;
  }

  .container {
    margin-top: 50px;
    margin-bottom: 50px;
  }

  form {
    margin-left: 20px;
  }

  footer {
    margin-top: auto;
    background-color: #f8f9fa;
  }
</style>

</body>
</html>
