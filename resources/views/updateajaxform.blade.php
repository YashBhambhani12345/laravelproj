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

<h2>Update</h2>

<form action="" method="POST" id="frm">
  @csrf
  <label for="name">name:</label><br>
  <input type="text" id="name" name="name" value="{{$record->name}}"><br>
  <label for="email">email:</label><br>
  <input type="text" id="email" name="email" value="{{$record->email}}"><br>
  <label for="password">password:</label><br>
  <input type="text" id="password" name="password" value="{{$record->password}}"><br><br>
  <input type="button" id="button" value="Submit">
</form> 
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function() {
    $('#button').on("click", function() {
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        var data = {
            id:"{{$record->id}}",
            name: $("#name").val(),
            email: $("#email").val(),
            password: $("#password").val()
        };
        var url = "{{url('editajax')}}" + '?' + $.param(data);
        console.log(data);
        $.ajax({
            url: url,
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            data: $('#frm').serialize(),
            success: function(result) {
                window.location.href = '/datashow';
            }
        });
    });
});
</script>

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