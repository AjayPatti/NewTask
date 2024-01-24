
<!DOCTYPE html>
<html lang="en">


<body>

    <div class="wrapper">
        <!-- Sidebar Holder -->
       @include('navbar')

        <!-- Page Content Holder -->
        <div id="content">
            <!-- top-bar -->
          @include('searchbar')
            <!--// top-bar -->

            <div class="container-fluid">
                <center><h1 class="mb-4">ADMIN-PANEL</h1></center>
                <div class="row">
                    <div class="outer-w3-agile col-xl ml-xl-3 mt-xl-0 mt-3">
                        <div class="stat-grid p-3 d-flex align-items-center justify-content-between " style="background-color: #FF5733;">
                            <div class="s-l">
                            <a herf="NEWS.PHP"> <h5>WHAT THE NEWS</h5></a>
                            </div>
                            <div class="s-r">
                                <h6>
                                <i class="fas fa-tasks"></i>
                                </h6>
                            </div>
                        </div>
                        

                        <div class="stat-grid p-3 mt-3 d-flex align-items-center justify-content-between" style="background-color: #6B3A6C;">
                            <div class="s-l">
                                <h5>VIEW-RESULT</h5>

                            </div>
                            <div class="s-r">
                                <h6>
                                    <i class="fas fa-sign-out-alt"></i>
                                </h6>
                            </div>
                        </div>


    
                    <!--SECEND--->
                   


                        <div class="stat-grid p-3 mt-3 d-flex align-items-center justify-content-between" style="background-color: #11505e;">
                            <div class="s-l">
                                <h5>FEEDBACK</h5>

                            </div>
                            <div class="s-r">
                                <h6>
                                    <i class="fas fa-users"></i>
                                                        </h6>
                            </div>
                        </div>
                        <div class="stat-grid p-3 mt-3 d-flex align-items-center justify-content-between" style="background-color: #11505e;">
                            <div class="s-l">
                                <h5>SETTING</h5>

                            </div>
                            <div class="s-r">
                                <h6>
                                    <i class="fas fa-users"></i>
                                                        </h6>
                                                        
                            </div>
                        </div>
    
    </div>
  @include('footer')

    <!-- Required common Js -->
 

</body>

</html>