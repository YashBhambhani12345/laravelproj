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
      <a class="navbar-brand">Profile</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="/"><a href="logout">Logout</a></li>
    </ul>
  </div>
</nav>
<h2 style="text-align: center;">Hello {{$value->name}}!</h2>
<div style="text-align: center; margin-bottom: 20px;">
  <a href="/changepasswordpage">
    <button class="btn btn-primary">Change Password</button>
  </a>
  <form action="status/{{$value->id}}" method="POST">
    @csrf
    <label for="status"> Status:</label>
    <select name="status" id="status">
      <option value="Present in office" >Present in Office</option>
      <option value="absent" >Absent</option>
      <option value="work from home" >Work from home</option>
    </select>
    <button type="submit">Submit</button>
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

  h2 {
    font-size: 32px;
    font-weight: bold;
    margin: 40px 0;
  }

  .btn-primary {
    font-size: 18px;
    padding: 10px 20px;
    border-radius: 4px;
  }

  footer {
    margin-top: auto;
  }
</style>
</body>
</html>
