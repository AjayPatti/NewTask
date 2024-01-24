<nav id="sidebar">
            <div class="sidebar-header">
                <h1 style="font-size:20px;">
                    <a href="index.html">Admin-panel</a>
                </h1>
                <span>M</span>
            </div>
            <div class="profile-bg"></div>
           
            <ul class="list-unstyled components">
                <li class="active">
                    <a href="{{route('customer')}}">
                        <i class="fa fa-user" id="cl"></i>Customers
                       

                    </a>
                </li>
               
              
                <li class="active">
                    <a href="dashborad.php">
                        <i class="fa fa-user" id="cl"></i>CHANGE-PASSWORD
                       

                    </a>
                </li>
                <li class="active">
                <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                                      
                </li>
               
                </ul>

        
        </nav>