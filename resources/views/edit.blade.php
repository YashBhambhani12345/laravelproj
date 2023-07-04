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
      <a class="navbar-brand">Project</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Login</a></li>
      <li><a href="/insertdata">Signup</a></li>
    </ul>
  </div>
</nav>

<h2>Update</h2>

<form action="{{ route('update',$ed['id']) }}" method="POST">
  @csrf
  <label for="name">name:</label><br>
  <input type="text" id="name" name="name" value="{{$ed['name']}}"><br>
  <label for="email">email:</label><br>
  <input type="text" id="email" name="email" value="{{$ed['email']}}"><br>
  <label for="roletype">roletype</label><br>
  <input type="text" id="roletype" name="roletype" value="{{$ed['roletype']}}"><br>
  <label for="salary">salary:</label><br>
  <input type="text" id="salary" name="salary" value="{{$ed['salary']}}"><br>
  <input type="submit" value="Submit">
</form> 
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

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2020 Copyright:
  </div>
  <!-- Copyright -->
</footer>
<style>
  body {
  min-height: 100vh;
  display: flex;
  flex-direction: column;
}
 footer {
  margin-top: auto;
}
</style>

</body>
</html>