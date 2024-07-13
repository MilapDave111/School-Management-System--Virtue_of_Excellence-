
  
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand " style="background-color:#03285e">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars text-white"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="../index.php" class="nav-link text-white">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="../contact.php" class="nav-link text-white">Contact</a>
        </li>
      </ul>
  
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link text-white" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>
  
        <!-- Messages Dropdown Menu -->
        
        <li class="nav-item">
          <a class="nav-link text-white" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt text-white"></i>
          </a>
        </li>
        
        <li class="nav-item">
          <a href="../logout.php" class="nav-link text-white" title="logout"> Logout
            <i class="fa fa-sign-out-alt"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->
  
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar  elevation-4" style="background-color:#03285e">
      <!-- Brand Logo -->
      <a href="<?=$site_url?>student/profile.php" class="brand-link">
       
        <center><h2 class=" text-white"><i class="fa fa-user fa-sm"></i>&nbsp; Student</h2></center>
      </a>
  
      <!-- Sidebar -->
      <div class="sidebar">
        
  
        <!-- SidebarSearch Form -->
     
  
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
                 <li class="nav-item ">
                  <a href="<?=$site_url?>student/dashboard.php" class="nav-link  text-white">
                    <i class="nav-con fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                  </a>
                </li>
  
                
                <li class="nav-item has-treeview ">
                  <a href="#" class="nav-link  text-white">
                    <i class="nav-con fas fa-users"></i>
                    <p>Classes
                    <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
  
                    <li class="nav-item">
                      <a href="<?=$site_url?>student/courses.php" class="nav-link text-white">
                        <i class="far fa-circle nav-icon text-white"></i>
                          <p>Courses</p>
                      </a>
                    </li>
  
                    <li class="nav-item">
                      <a href="<?=$site_url?>student/subjects.php" class="nav-link text-white">
                        <i class="far fa-circle nav-icon text-white "></i>
                          <p>Subjects</p>
                      </a>
                    </li>
  
                  </ul>
                </li> 
  
                <li class="nav-item has-treeview ">
                  <a href="#" class="nav-link  text-white">
                    <i class="nav-con fas fa-users"></i>
                    <p>Class Routine
                    <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?=$site_url?>student/periods.php" class="nav-link text-white">
                        <i class="far fa-circle nav-icon text-white "></i>
                          <p>Periods</p>
                      </a>
                    </li>
  
                    <li class="nav-item">
                      <a href="<?=$site_url?>student/timetable.php" class="nav-link text-white">
                        <i class="far fa-circle nav-icon text-white "></i>
                          <p>Time Table</p>
                      </a>
                    </li>
                  </ul>
                </li> 


                <li class="nav-item has-treeview ">
                  <a href="#" class="nav-link  text-white">
                    <i class="nav-con fas fa-users"></i>
                    <p>Examnination
                    <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                    <a href="<?=$site_url?>student/examtimetable.php" class="nav-link text-white">
                        <i class="far fa-circle nav-icon text-white"></i>
                          <p>Exam Time Table</p>
                      </a>
                    </li>
  
                    
                  </ul>
                </li> 
  
  
                
                <li class="nav-item has-treeview ">
                  <a href="<?=$site_url?>student/fee-details.php" class="nav-link  text-white">
                    <i class="nav-con fas fa-users"></i>
                    <p>Fees Detail
                    <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
  
                  
  
  
                </li> 


                <li class="nav-item has-treeview ">
                  <a href="<?=$site_url?>student/e-content.php" class="nav-link  text-white">
                    <i class="nav-con fas fa-users"></i>
                    <p>E-Content
                    <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  
                </li> 


             
  
                <li class="nav-item has-treeview ">
                  <a href="<?=$site_url?>student/lib.php" class="nav-link  text-white">
                    <i class="nav-con fas fa-users"></i>
                    <p>Library
                    <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  
                </li>

                <li class="nav-item has-treeview ">
                  <a href="<?=$site_url?>student/transportation.php" class="nav-link  text-white">
                    <i class="nav-con fas fa-users"></i>
                    <p>Transportaion
                    <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  
                </li>

                <li class="nav-item has-treeview ">
                  <a href="<?=$site_url?>student/event.php" class="nav-link  text-white">
                    <i class="nav-con fas fa-users"></i>
                    <p>Upcomming Events
                    <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  
                </li>
  
                
                
  
              </ul>
            </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
  
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">