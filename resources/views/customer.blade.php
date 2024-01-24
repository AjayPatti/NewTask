
<!DOCTYPE html>
<html lang="en">

@include('header')

<body>

    <div class="wrapper">
        <!-- Sidebar Holder -->
       @include('navbar')

        <!-- Page Content Holder -->
        <div id="content">
            <!-- top-bar -->
          @include('searchbar')
            <!--// top-bar -->

            <div class="container">
                <center><h5>CUSTOMER-PANEL</h5></center>
               <?php 
               if($login_type == 'admin') { ?>
                   <a href="{{ route('add') }}" class="btn btn-primary ">Add</a>
            <?php   } else{?>
                <a href="#" class="btn btn-primary ">Add</a>
           <?php } ?>
               
             
                <div class="row">
                    <div class="col-sm-12">
                            <table id="dtExample" class="display">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Adress</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php $count = 1; ?>
                                    @foreach($data as $key=>$customer)
                                        
                                    <tr>

                                        <td>{{$count}}</td>
                                        <td>{{$customer['name']}}</td>
                                        <td>{{$customer['email']}}</td>
                                        <td>{{$customer['mobile']}}</td>
                                        <td>{{$customer['address']}}</td>
                                        
                                        <td>
                                            <a href="javascript:void(0)" data-bs-toggle="modal" class="btn btn-success" data-bs-target="#exampleModal"  data-id="{{$customer['id']}}" onclick="Edit(this)" title="Edit"><i class="fa-solid fa-pen-to-square"></i><a>
                                            
               
                                            <a href="javascript:void(0)"  data-id="{{$customer['id']}}" onclick="reject(this)" title="Reject" class="btn btn-danger" ><i class="fa-solid fa-trash"></i></a>
                                    
                                        </td>
                                      
                                    </tr>
                                    <?php $count ++; ?>
                                    @endforeach
                                 
                                </tbody>
                            </table>

                </div>

    
                    <!--SECEND--->
                   


                       
                        </div>
    
    </div>
    <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="#" method="post" class="p-lg-5" id="add-cust">
                @csrf
          <div class="form-group">
            <!-- <label for="exampleInputEmail1"> Name</label> -->
            <input type="text" class="form-control" name="name" id="name"  placeholder="Name">
            <span id="name_error" class=" text-danger"></span>
          </div>
            <input type="hidden" name="id" id="user_id">
          <div class="form-group">
           <!-- <label for="exampleInputEmail1">Email Id</label> -->
            <input type="email" class="form-control" id="email" name=" email"placeholder="Email Id" >
            <span id="email_error" class=" text-danger"></span>
          </div>
          
          <div class="form-group">
            <label for="exampleInputEmail1">Mobile</label>
            <input type="text" class="form-control" name="mobile" id="mobile"placeholder="Mobile">
            <span id="password_error" class=" text-danger" ></span>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Address</label>
            <input type="text" class="form-control" name="address" id="address"placeholder="Address">
            <span id="password_error" class=" text-danger" ></span>
          </div>
       
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
     </form>
    </div>
  </div>
</div>
  @include('footer')

    <!-- Required common Js -->
    <script>
    $(document).ready( function () {
    $('#dtExample').DataTable();

    $("#add-cust").on('submit',function(e){
    e.preventDefault(); 
        $.ajax({
            url: "{{route('update')}}", 
            data: $(this).serialize(), 
            type: "post", 
            success: function (resp) { 
                if(resp.status){
                const route = '{{route("customer")}}';
                window.location.href = route
                }
                
        },
      
    }); 
  
});
} )

function Edit(elem){
    let id =$(elem).data('id');
    $('#user_id').val(id)
    $('#email').val('')
    $('#name').val('')
    $('#mobile').val('')
    $('#address').val('')
    $.ajax({
        type: "get",
        url: "{{route('edit')}}",
        data: { id: id},
        success: function (response) {
                json =response[0];
                $('#email').val(json.email)
                $('#name').val(json.name)
                $('#mobile').val(json.mobile)
                $('#address').val(json.address)

        }
    })
   
}
function reject(elem){
let id =$(elem).data('id');
    $.ajax({
        type: "post",
        url: "{{route('reject')}}",
        data: {"_token": "{{ csrf_token() }}", id: id},
        success: function (response) {
           if(response.status){
               location.reload()
           }

            
        }
    });
}
$(document).ready(function(){
$
});
</script>
</body>

</html>