<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel 6 CRUD</title>
    <!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Google Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>

    <style> 
     .container{
         padding:0.5%;
     }
    </style>
</head>

<body>
<div class="container">
    <h2 class="alert alert-success">Laravel 6 crud</h2>
<div class="row">
<a href="" class="btn btn-success" style="margin-left:60%;">Served Order</a>
<a href="/resturant" class="btn btn-info">View New Orders</a>
    <div class="col-md-12">
     <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Table Number</th>
                <th>Order</th>
                <th>Action</th>
            </tr>
            <tbody>
            @foreach($serve as $key=>$data)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->table_num}}</td>
                    <td>{{$data->order}}</td>
                    <td>Order Completed</td>
                </tr>
                @endforeach
            </tbody>
            
        </thead>
     </table>
    </div>
</div>
</div>
</body>
</html>