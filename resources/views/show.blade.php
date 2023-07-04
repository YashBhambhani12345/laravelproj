<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Human Resource Management System</title>
    <style>
        /* Reset default margin and padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Global styles */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.5;
            background-color: #f4f4f4;
            color: #333;
        }

        /* Glass morphism effect */
        .glass-container {
            background-color: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Header */
        .header {
            background-color: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin: 20px;
            margin-bottom: 0;
        }

        /* Footer */
        .footer {
            background-color: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin: 20px;
            margin-top: 0;
        }

        /* Heading */
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        /* Search Container */
        .search-container {
            text-align: center;
            margin: 20px 0;
        }

        /* Table */
        table {
            margin: 0 auto;
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

       

        td {
            background-color: #f2f2f2;
        }

        /* Pagination */
        .page {
            text-align: center;
            margin-top: 20px;
        }

        ul {
            list-style: none;
        }

        li {
            margin: 5px;
            display: inline;
            padding: 5px 10px;
            cursor: pointer;
        }

        li.active {
            background-color: #ccc;
            color: #333;
        }

        /* Responsive styles */
        @media (max-width: 600px) {
            .glass-container {
                margin: 10px;
                padding: 10px;
            }

            .header, .footer {
                margin: 10px;
                padding: 10px;
            }
        }
        #recordpage{
          width:20px;
        }
    </style>
</head>
<body>
<div class="header">
    <h1>Human Resource Management System</h1>
</div>

<div class="search-container">
    <form action="">
        <input type="text" id="letter" placeholder="Search.." name="search">
        <button type="button" id="button"><i class="fa fa-search"></i></button>
    </form>
</div>

<table id="User">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Age</th>
        <th>Email</th>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>

<table id="Userdata">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Age</th>
        <th>Email</th>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>

<div class="page">
    <input type="text" id="recordpage" placeholder="" name="recordpage">
    <ul>
        <li id="page1">1</li>
        <li id="page2">2</li>
        <li id="page3">3</li>
    </ul>
</div>

<div class="footer">
    &copy; 2023 HRMS. All rights reserved.
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script> 
var count=0;
$(document).ready(function() {
  var table = $("#User");
    $.ajax({
        url: "http://localhost:8000/datafetch", 
        type: 'GET',
        success: function(response) {
            console.log(response.data);
            response.data.forEach(function(user) {
                var ed=user.id;
                var row = $("<tr></tr>");
                row.append("<td>" + user.id + "</td>");
                row.append("<td>" + user.Name + "</td>");
                row.append("<td>" + user.Age + "</td>");
                row.append("<td>" + user.Email + "</td>");
                row.append("<td>"+"<a href='/updateajax/"+ed+"'><button>Edit</button></a>")
                table.append(row);
            });
        }
    });
});
$(document).ready(function() {
  var table = $("#User");
  var table2 = $("#Userdata");
  table2.hide();
  $('#letter').on("keyup", function() {
    var searchQuery = $(this).val();
    if (searchQuery.trim() !== '') {
      $.ajax({
        url: "http://localhost:8000/search",
        type: 'GET',
        data: { query: searchQuery },
        success: function(response) {
          console.log(response.data);
          table2.empty(); 
          table.hide();
          response.data.forEach(function(Userdata) {
            var ed = Userdata.id;
            var row = $("<tr></tr>");
            row.append("<td>" + Userdata.id + "</td>");
            row.append("<td>" + Userdata.Name + "</td>");
            row.append("<td>" + Userdata.Age + "</td>");
            row.append("<td>" + Userdata.Email + "</td>");
            row.append("<td>" + "<a href='/updateajax/" + ed + "'><button>Edit</button></a>");
            table2.append(row);
            table2.show();
          });        
        }
      });        
    }
    else{
      table.show();
      table2.hide();
    }
  }); 
});


$(document).ready(function() {
  var table = $("#User");
  var table2 = $("#Userdata");
  table2.hide();
  $('#recordpage').on("keyup", function() {
    if (count===1) {
      $.ajax({
        url: "{{ url('pagedata2') }}",
        type: 'GET',
        data: {
          limit: $("#recordpage").val()
        },
        success: function(result) {
          table.hide();
          table2.empty();
          console.log(result.ans2);
          result.ans2.forEach(function(Userdata) {
            var ed = Userdata.id;
            var row = $("<tr></tr>");
            row.append("<td>" + Userdata.id + "</td>");
            row.append("<td>" + Userdata.Name + "</td>");
            row.append("<td>" + Userdata.Age + "</td>");
            row.append("<td>" + Userdata.Email + "</td>");
            row.append("<td>" + "<a href='/updateajax/" + ed + "'><button>Edit</button></a>");
            table2.append(row);
            table2.show();
          });
        }
      });
    }
    else if(count===2) {
      $.ajax({
        url: "{{ url('pagedata3') }}",
        type: 'GET',
        data: {
          limit: $("#recordpage").val()
        },
        success: function(result) {
          table.hide();
          table2.empty();
          console.log(result.ans3);
          result.ans3.forEach(function(Userdata) {
            var ed = Userdata.id;
            var row = $("<tr></tr>");
            row.append("<td>" + Userdata.id + "</td>");
            row.append("<td>" + Userdata.Name + "</td>");
            row.append("<td>" + Userdata.Age + "</td>");
            row.append("<td>" + Userdata.Email + "</td>");
            row.append("<td>" + "<a href='/updateajax/" + ed + "'><button>Edit</button></a>");
            table2.append(row);
            table2.show();
          });
        }
      });
    }
    else{
      $.ajax({
        url: "{{ url('pagedata1') }}",
        type: 'GET',
        data: {
          limit: $("#recordpage").val()
        },
        success: function(result) {
          table.hide();
          table2.empty();
          console.log(result.ans1);
          result.ans1.forEach(function(Userdata) {
            var ed = Userdata.id;
            var row = $("<tr></tr>");
            row.append("<td>" + Userdata.id + "</td>");
            row.append("<td>" + Userdata.name + "</td>");
            row.append("<td>" + Userdata.email + "</td>");
            row.append("<td>" + "<a href='/updateajax/" + ed + "'><button>Edit</button></a>");
            table2.append(row);
            table2.show();
          });
        }
      });

    }
  });
});
$(document).ready(function() {
  var table = $("#User");
  var table2 = $("#Userdata");
  table2.hide();
  $('#page1').on("click", function() {
    document.getElementById('page1').style.textDecoration = "underline";
    document.getElementById('page2').style.textDecoration = "none";
    document.getElementById('page3').style.textDecoration = "none";
    $.ajax({
      url: "{{ url('pagedata1') }}",
      type: 'GET',
      data:{
        limit:$("#recordpage").val()
      },
      success: function(result) {
        table.hide();
        table2.empty();
        console.log(result.ans1);
        result.ans1.forEach(function(Userdata) {
            var ed = Userdata.id;
            var row = $("<tr></tr>");
            row.append("<td>" + Userdata.id + "</td>");
            row.append("<td>" + Userdata.Name + "</td>");
            row.append("<td>" + Userdata.Age + "</td>");
            row.append("<td>" + Userdata.Email + "</td>");
            row.append("<td>" + "<a href='/updateajax/" + ed + "'><button>Edit</button></a>");
            table2.append(row);
            table2.show();
        }); 
      }
    });
  });
});

$(document).ready(function() {
  var table = $("#User");
  var table2 = $("#Userdata");
  table2.hide();
  $('#page2').on("click", function() {
    count=1;
    console.log(count);
    document.getElementById('page1').style.textDecoration = "none";
    document.getElementById('page2').style.textDecoration = "underline";
    document.getElementById('page3').style.textDecoration = "none";
    $.ajax({
      url: "{{ url('pagedata2') }}",
      type: 'GET',
      data:{
        limit:$("#recordpage").val()
      },
      success: function(result) {
        table.hide();
        table2.empty();
        console.log(result.ans2);
        result.ans2.forEach(function(Userdata) {
            var ed = Userdata.id;
            var row = $("<tr></tr>");
            row.append("<td>" + Userdata.id + "</td>");
            row.append("<td>" + Userdata.Name + "</td>");
            row.append("<td>" + Userdata.Age + "</td>");
            row.append("<td>" + Userdata.Email + "</td>");
            row.append("<td>" + "<a href='/updateajax/" + ed + "'><button>Edit</button></a>");
            table2.append(row);
            table2.show();
        }); 
      }
    });
  });
});

$(document).ready(function() {
  var table = $("#User");
  var table2 = $("#Userdata");
  table2.hide();
  $('#page3').on("click", function() {
    count=2;
    document.getElementById('page1').style.textDecoration = "none";
    document.getElementById('page2').style.textDecoration = "none";
    document.getElementById('page3').style.textDecoration = "underline";
    $.ajax({
      url: "{{ url('pagedata3') }}",
      type: 'GET',
      data:{
        limit:$("#recordpage").val()
      },
      success: function(result) {
        table.hide();
        table2.empty();
        console.log(result.ans3);
        result.ans3.forEach(function(Userdata) {
            var ed = Userdata.id;
            var row = $("<tr></tr>");
            row.append("<td>" + Userdata.id + "</td>");
            row.append("<td>" + Userdata.Name + "</td>");
            row.append("<td>" + Userdata.Age + "</td>");
            row.append("<td>" + Userdata.Email + "</td>");
            row.append("<td>" + "<a href='/updateajax/" + ed + "'><button>Edit</button></a>");
            table2.append(row);
            table2.show();
        }); 
      }
    });
  });
});
</script>

</body>
</html>
