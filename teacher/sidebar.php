 
 <!-- Navbar -->
  <nav class="main-header navbar navbar-expand " style="background-color:#03285e">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link  text-white" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars text-white"></i></a>
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
          <i class="fas fa-search text-white"></i>
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
          <i class="fas fa-expand-arrows-alt text-white "></i>
        </a>
      </li>
      <li class="nav-item">
        <a href="../logout.php" class="nav-link text-white">Logout <i class="fa fa-sign-out-alt"> </i></a>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar" style="background-color:#03285e">
    <!-- Brand Logo -->
    <a href="<?=$site_url?>teacher/profile.php" class="brand-link">
    
     
    <center><h2 class=" text-white"><i class="fa fa-user fa-sm"></i>&nbsp; Teacher</h2></center>
    

    

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      

      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
            
            <li class="nav-item ">
            <a href="<?=$site_url?>teacher/dashboard.php" class="nav-link "  style="background-color:#468ef3">
              <i class="nav-icon fas fa-tachometer-alt  text-white"></i>
              <p class=" text-white">
                Dashboard
              </p>
            </a>
            <li class="nav-item">
                <a href="<?=$site_url?>teacher/manage_students.php" class="nav-link text-white">
                  <i class="nav-icon fas fa-users text-white"></i>
                  <p>Manage Students</p>
                </a>
              </li>   
            
          <li class="nav-item ">
            <a href="#" class="nav-link  text-white ">
              <i class="nav-icon fas fa-users  text-white"></i>
              <p>
                Manage Classes
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="<?=$site_url?>teacher/sections.php" class="nav-link  text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sections</p>
                </a>
              </li>  
             <li class="nav-item">
                <a href="<?=$site_url?>teacher/classes.php" class="nav-link  text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Classes</p>
                </a>
              </li>
             
              <li class="nav-item">
                <a href="<?=$site_url?>teacher/courses.php" class="nav-link  text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Courses</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=$site_url?>teacher/subjects.php" class="nav-link  text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Subjects</p>
                </a>
              </li>
              
              
            </ul>
            
          </li>

          <li class="nav-item ">
            <a href="#" class="nav-link  text-white ">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Manage Class Routine
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=$site_url?>teacher/periods.php" class="nav-link  text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Periods</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=$site_url?>teacher/timetable.php" class="nav-link  text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Time Table</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=$site_url?>teacher/e-content.php" class="nav-link  text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>E-Content</p>
                </a>
              </li>
             </ul>
            
          </li>
          <li class="nav-item ">
            <a href="#" class="nav-link  text-white ">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Examination 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="<?=$site_url?>teacher/examtimetable.php" class="nav-link  text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Exam Timetable</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=$site_url?>teacher/result.php" class="nav-link  text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Result</p>
                </a>
              </li>
            </ul>
            </li>
          <li class="nav-item ">
            <a href="#" class="nav-link  text-white ">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Manage Attendance
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="<?=$site_url?>teacher/attendance.php" class="nav-link  text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Attendance</p>
                </a>
              </li>  
            </ul>
            
          </li>
          

          <li class="nav-item ">
            <a href="#" class="nav-link  text-white ">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Leave Application 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="<?=$site_url?>teacher/leave.php" class="nav-link  text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Leave</p>
                </a>
              </li>
            </ul>
            </li>

          

            <li class="nav-item">
                      <a href="<?=$site_url?>teacher/event.php" class="nav-link  text-white">
                        <i class="nav-icon fas fa-users "></i>
                          <p>Events</p>
                      </a>
                    </li>
            
          
              
          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color:#dae0eb">






  



       