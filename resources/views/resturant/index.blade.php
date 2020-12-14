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
<a href="/served" class="btn btn-success" style="margin-left:65%;">Served Order</a>
<a href="" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Order Now</a>
    <div class="col-md-12">
    
     <!-- Displaying any event massages like Create, Delete and Update -->
    @if($message = Session::get('success'))
        <div class="alert-success">
            <p style="padding:1%;">{{$message}}</p>
        </div>
    @endif
          
      <!-- displaying validating information -->
  <div class="alert-danger">
            @foreach($errors->all() as $e)
            <p style="padding:10px 0 0 30px;">{{$e}}</p>
            @endforeach
  </div>


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
            @foreach($resturants as $key=>$resturant)
                <tr>
                    <td>{{++$key}}</td>
                    <!-- <td>{{$resturant->id}}</td> -->
                    <td>{{$resturant->name}}</td>
                    <td>{{$resturant->table_num}}</td>
                    <td>{{$resturant->order}}</td>
                    <td>
                        <!-- ----------------------Viewing Selected data ------------ -->
                        <a href="" data-resturant_id="{{$resturant->id}}" 
                        data-name="{{$resturant->name}}"  
                        data-table_num="{{$resturant->table_num}}" 
                        data-order="{{$resturant->order}}"
                        data-toggle="modal" data-target="#exampleModal-show" 
                        type="button" class="btn btn-info btn-sm">View</a>

                        <!-- ----------------------Fetching data for editing------------ -->
                        <a href="" data-resturant_id="{{$resturant->id}}" 
                        data-name="{{$resturant->name}}"  
                        data-table_num="{{$resturant->table_num}}" 
                        data-order="{{$resturant->order}}"
                        data-toggle="modal" data-target="#exampleModal-edit" 
                        type="button" class="btn btn-info btn-sm">Edit</a>

                        <!-- ----------------------Delete Selected data------------ -->
                        <a href="" data-resturant_id="{{$resturant->id}}" 
                        data-toggle="modal" data-target="#exampleModal-delete" 
                        type="button" class="btn btn-danger btn-sm">Order Served</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
            {{$resturants->links()}}
        </thead>
     </table>

     <!-- Adding Add resturant modal -->
<!-- Modal -->
<div class="modal fade right" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-lg modal-right modal-success" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
 
      <div class="modal-body">
        <form action="{{route('resturant.store')}}" method="POST">
        @csrf
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Customer's Name</span>
                </div>
                <input type="text" class="form-control" name="name" placeholder="Enter Name">
            </div>
            <br>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Table Number</span>
                </div>
                <input type="text" class="form-control" name="table_num" placeholder="Enter Table Number">
            </div>
            <br>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Order Items</span>
                </div>
                <input type="text" class="form-control" name="order" placeholder="What would you like to have?">
            </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        <button type="Submit" class="btn btn-success">Order Now</button>
      </div>
      </form>
    </div>
  </div>
</div>
 <!-- Adding Edit resturant modal -->
<!-- Modal -->
<div class="modal fade left" id="exampleModal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-lg modal-right modal-info" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{route('resturant.update','resturant_id')}}" method="POST">
        @csrf
        @method('PUT')
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Customer's Name</span>
                </div>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
            </div>
            <input type="hidden" id="resturant_id" name="resturant_id">
            <br>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Table Number</span>
                </div>
                <input type="text" class="form-control" id="table_num" name="table_num" placeholder="Enter Table Number">
            </div>
            <br>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Order Items</span>
                </div>
                <input type="text" class="form-control" id="order" name="order" placeholder="What would you like to have?">
            </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        <button type="Submit" class="btn btn-success">Update This</button>
      </div>
      </form>
    </div>
  </div>
</div>
 <!-- Adding Delete resturant modal -->
<!-- Modal -->
<div class="modal fade top" id="exampleModal-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-right modal-danger" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('resturant.destroy','resturant_id')}}" method="POST">
        @csrf
        @method('DELETE')
            <input type="hidden" id="resturant_id" name="resturant_id">
            <p class="text-center" width="50px">Is this order served to table?</p>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">No</button>
        <button type="Submit" class="btn btn-danger">Yes, Order Served</button>
      </div>
      </form>
    </div>
  </div>
</div>

 <!-- Show resturant modal -->
<!-- Modal -->
<div class="modal fade down" id="exampleModal-show" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-lg modal-right modal-info" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{route('resturant.show','resturant_id')}}" method="POST">
        @csrf
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Customer's Name</span>
                </div>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" readonly>
            </div>
            <input type="hidden" id="resturant_id" name="resturant_id">
            <br>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Table Number</span>
                </div>
                <input type="text" class="form-control" id="table_num" name="table_num" placeholder="Enter Table Number" readonly>
            </div>
            <br>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Order Items</span>
                </div>
                <input type="text" class="form-control"id="order" name="order" placeholder="What would you like to have?" readonly>
            </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>


</div>
</div>
</div>
</body>
<script>
    // For editing 
    $('#exampleModal-edit').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget)
        var name = button.data('name')  // name inside data is a id given to input tag in the form above
        var table_num = button.data('table_num')
        var order = button.data('order')
        var resturant_id = button.data('resturant_id')

        var modal = $(this)

        modal.find('.modal-title').text('EDIT ORDER INFORMATION')
        modal.find('.modal-body #name').val(name)
        modal.find('.modal-body #table_num').val(table_num)
        modal.find('.modal-body #order').val(order)
        modal.find('.modal-body #resturant_id').val(resturant_id)
    });

    // For Deleting 
    $('#exampleModal-delete').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget)
        var resturant_id = button.data('resturant_id')
        var modal = $(this)
        modal.find('.modal-title').text('DELETE ORDER')
        modal.find('.modal-body #resturant_id').val(resturant_id)
    });


     // For showing selected data 
     $('#exampleModal-show').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget)
        var name = button.data('name')  // name inside data is a id given to input tag in the form above
        var table_num = button.data('table_num')
        var order = button.data('order')
        var resturant_id = button.data('resturant_id')

        var modal = $(this)

        modal.find('.modal-title').text('VIEW ORDER INFORMATION')
        modal.find('.modal-body #name').val(name)
        modal.find('.modal-body #table_num').val(table_num)
        modal.find('.modal-body #order').val(order)
        modal.find('.modal-body #resturant_id').val(resturant_id)
    });
</script>
</html>