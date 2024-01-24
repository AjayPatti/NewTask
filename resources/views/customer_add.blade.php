
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
                <center><h6 class="mb-4">ADMIN-PANEL</h6></center>
                <div class="row">
                    <div class="col-sm-8">

                        <form action="#" method="post" class="p-lg-5" id="addform">
                @csrf
          <div class="form-group">
            <!-- <label for="exampleInputEmail1"> Name</label> -->
            <input type="text" class="form-control" name="name"  placeholder="Name">
            <span id="name_error" class=" text-danger"></span>
          </div>
        
          <div class="form-group">
           <!-- <label for="exampleInputEmail1">Email Id</label> -->
            <input type="email" class="form-control"  name=" email"placeholder="Email Id" >
            <span id="email_error" class=" text-danger"></span>
          </div>
          <div class="form-group">
            <!-- <label for="exampleInputEmail1">Password</label> -->
            <input type="text" class="form-control" name="mobile"placeholder="Mobile">
            <span id="mobile_error" class=" text-danger" ></span>
          </div>
          <div class="form-group">
            <!-- <label for="exampleInputEmail1">Password</label> -->
           <textarea name="address" id="" cols="10" rows="5" class="form-control" placeholder="Address"></textarea>
          </div>
          <button type="submit" name="save" class="btn btn-primary" >Submit</button>
          <a href="{{route('customer')}}" class="btn btn-primary">Back</a>
        </form>
                    </div>
                        </div>
    
    </div>
  @include('footer')

    <!-- Required common Js -->
    <script>
$(document).ready(function(){
$("#addform").on('submit',function(e){
   e.preventDefault(); 
    $.ajax({
        url: "{{route('add-customer')}}", 
        data: $("#addform").serialize(), 
        type: "post", 
        success: function (resp) { 
            if(resp.status){
              const route = '{{route("customer")}}';
              window.location.href = route
            }
            
        },
        error:function(e){
        if(e.status === 422){
          var response = e.responseJSON.errors;
          console.log(response);
          $.each(response, function(key, val) {
              console.log(val);
              $("#" + key + "_error").text(val[0]);
          })

        }
        }
    }); 
    return false;
});
});

</script>

</body>

</html>