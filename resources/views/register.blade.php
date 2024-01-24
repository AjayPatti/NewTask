<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body style="background:url(67.jpg)center;background-size:cover; ">
    
     <div class="container-fluid p-lg-5 mt-4" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%);">  
            <div class="row" >
                <div class="col-sm-3" ></div>
                <div class="col-sm-5"style="background-color:white;">
                    <h1><center>Registration</center></h1>
    <form action="#" method="post" class="p-lg-5" id="form">
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
  </div><div class="form-group">
    <!-- <label for="exampleInputEmail1">Password</label> -->
    <input type="text" class="form-control" name="password"placeholder="Password">
    <span id="password_error" class=" text-danger"></span>
  </div><div class="form-group">
    <!-- <label for="exampleInputEmail1">Confirm Password</label> -->
    <input type="text" class="form-control"name="password"placeholder="Confirm Password" >
  
  </div>

  
  <input class="btn btn-primary" type="reset" value="Reset"><a href="Register.php"></a>
  <button type="submit" name="save" class="btn btn-primary" >Submit</button>
  <input class="btn btn-primary" type="submit" value="back"><a href="online college.php"></a>
</form>

</div>
</div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
$(document).ready(function(){
$("#form").on('submit',function(e){
    e.preventDefault();
    $.ajax({
        url: "{{ route('register') }}", 
        data: $("#form").serialize(), 
        type: "post", 
        success: function (resp) {
            if(resp.status){
              const route ='{{route("home")}}';
              window.location.href = route;
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