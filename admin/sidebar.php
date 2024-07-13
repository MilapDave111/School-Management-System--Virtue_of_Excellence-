<?php
 
$db_conn = mysqli_connect('localhost', 'root', '', 'virtue2');

if (!$db_conn)
{
    echo "connection fail";
    exit();
}
 
?>
  
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand " style="background-color:#03285e">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-white" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
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
      

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link text-white" href="inquiry.php">
          <i class="far fa-comments text-white"></i>
          <span class="badge badge-danger navbar-badge text-white">
          <?php 
            $query = mysqli_query($db_conn,"SELECT COUNT(*) FROM inquiry");
            $row = $query->fetch_assoc();
            $inquiry = implode(',', $row);
            echo $inquiry;
            ?>
        </span>
        </a>
        
           
      </li>
      
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
  <aside class="main-sidebar "style="background-color:#03285e">
    <!-- Brand Logo -->
    <a href="<?=$site_url?>" class="brand-link">
      
    <center><h2 class=" text-white"><i class="fa fa-user fa-sm"></i>&nbsp; Admin</h2></center>
    

    

    <!-- Sidebar -->
    <div class="sidebar" >
      <!-- Sidebar user panel (optional) -->
      

      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" >
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
            
            <li class="nav-item ">
            <a href="<?=$site_url?>admin/dashboard.php" class="nav-link " style="background-color:#468ef3" >
              <i class="nav-icon fas fa-tachometer-alt text-white"></i>
              <p class="text-white">
                Dashboard
              </p>
            </a>
            
            <li class="nav-item ">
            <a href="#" class="nav-link text-white ">
              <i class="nav-icon fas fa-users text-white"></i>
              <p class="text-white">
                Manage Accounts
                <i class="fas fa-angle-left right text-white"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
            <li class="nav-item">
                <a href="<?=$site_url?>admin/user_account.php?user=teacher" class="nav-link">
                  <i class="far fa-circle nav-icon text-white"></i>
                  <p class="text-white">Teachers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=$site_url?>admin/user_account.php?user=student" class="nav-link">
                  <i class="far fa-circle nav-icon text-white"></i>
                  <p class="text-white">Students</p>
                </a>
              </li>
             
            </ul>
            
          </li>
          <li class="nav-item ">
            <a href="#" class="nav-link text-white">
              <i class="nav-icon fas fa-users text-white"></i>
              <p class="text-white">
                Manage Classes
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="<?=$site_url?>admin/sections.php" class="nav-link text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="text-white">Sections</p>
                </a>
              </li>  
             <li class="nav-item">
                <a href="<?=$site_url?>admin/classes.php" class="nav-link">
                  <i class="far fa-circle nav-icon text-white"></i>
                  <p class="text-white">Classes</p>
                </a>
              </li>
             
              <li class="nav-item">
                <a href="<?=$site_url?>admin/courses.php" class="nav-link">
                  <i class="far fa-circle nav-icon text-white"></i>
                  <p class="text-white">Courses</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=$site_url?>admin/subjects.php" class="nav-link text-white">
                  <i class="far fa-circle nav-icon text-white"></i>
                  <p class="text-white">Subjects</p>
                </a>
              </li>
              
              
            </ul>
            
          </li>

          <li class="nav-item ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-users text-white"></i>
              <p class="text-white">
                Manage Classes Routins
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=$site_url?>admin/periods.php" class="nav-link">
                  <i class="far fa-circle nav-icon text-white"></i>
                  <p class="text-white">Periods</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=$site_url?>admin/timetable.php" class="nav-link text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="text-white">Student Time Table</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=$site_url?>admin/teacher_timetable.php" class="nav-link text-white">
                  <i class="far fa-circle nav-icon text-white"></i>
                  <p class="text-white">Teacher Time Table</p>
                </a>
              </li>
             </ul>
            </li>
          
            
          
         

           <li class="nav-item ">
           <a href="<?=$site_url?>admin/lib.php" class="nav-link text-white ">
              <i class="nav-icon fas fa-users text-white"></i>
              <p class="text-white">
                Library
                <i class="fas fa-angle-left right text-white"></i>
              </p>
            </a>
            
          </li>

          <li class="nav-item ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-users text-white"></i>
              <p class="text-white">
                Transportation
                <i class="fas fa-angle-left right text-white"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=$site_url?>admin/transportation.php" class="nav-link text-white">
                  <i class="far fa-circle nav-icon text-white"></i>
                  <p class="text-white">Add Bus</p>
                </a>
              </li>
             
             </ul>
            </li>
            <li class="nav-item ">
            <a href="<?=$site_url?>admin/inquiry.php" class="nav-link text-white">
              <i class="nav-icon fas fa-users text-white"></i>
              <p class="text-white">
                Inquiry
                <i class="fas fa-angle-left right text-white"></i>
              </p>
            </a>


          <li class="nav-item ">
            <a href="<?=$site_url?>admin/event.php" class="nav-link ">
              <i class="nav-icon fas fa-users text-white"></i>
              <p class="text-white">
                Events
                <i class="fas fa-angle-left right text-white"></i>
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
  <div class="content-wrapper" style="background-color:#dae0eb">






  



       