<html>
   <head>
      <title>Record</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   </head>
   <body>
      <header>
         <nav class="navbar navbar-default">
            <div class="container-fluid">
               <div class="navbar-header">
                  <a class="navbar-brand"></a>
               </div>
            </div>
         </nav>
      </header>
      <main>
         <h1>Data</h1>
       
         <table class="table">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Phone NO.</th>
               </tr>
            </thead>
            <tbody>

                
               @foreach ($users as $user)
               <tr>
                  <td>{{ $user->people->id }}</td>
                  <td>{{ $user->people->name }}</td>
                  <td>{{ $user->email}}</td>
                  <td>{{ $user->people->address }}</td>
                  <td>{{ $user->people->phonenumber}}</td>
                  
               </tr>
               @endforeach
            </tbody>
         </table>
      </main>
      <footer class="bg-light text-muted">
         <div class="container">
            <div class="row">
               <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                  <h5 class="text-uppercase">Footer text</h5>
                  <p>
                     Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste atque ea quis molestias. Fugiat pariatur maxime quis culpa corporis vitae repudiandae aliquam voluptatem veniam, est atque cumque eum delectus sint!
                  </p>
               </div>
               <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                  <h5 class="text-uppercase">Footer text</h5>
                  <p>
                     Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste atque ea quis molestias. Fugiat pariatur maxime quis culpa corporis vitae repudiandae aliquam voluptatem veniam, est atque cumque eum delectus sint!
                  </p>
               </div>
            </div>
         </div>
         <div class="text-center p-3">
            © 2023 Your Company. All rights reserved.
         </div>
      </footer>
      <style>
         body {
         min-height: 100vh;
         display: flex;
         flex-direction: column;
         }
         header {
         background-color: #f8f9fa;
         padding: 20px 0;
         }
         main {
         flex-grow: 1;
         padding: 20px;
         }
         h1 {
         text-align: center;
         }
         .button-container {
         text-align: center;
         margin-bottom: 20px;
         }
         .table {
         margin: 0 auto;
         width: 80%;
         border-collapse: collapse;
         box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
         }
         th,
         td {
         padding: 10px;
         text-align: left;
         border-bottom: 1px solid #ddd;
         }
         th {
         background-color: #333;
         color: #fff;
         }
         td {
         background-color: #f2f2f2;
         }
         .email-column {
         width: 40%;
         max-width: 400px;
         white-space: nowrap;
         overflow: hidden;
         text-overflow: ellipsis;
         }
         .actions-column {
         white-space: nowrap;
         }
         .btn {
         margin: 5px;
         }
      </style>
   </body>
</html>
