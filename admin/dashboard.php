<?php include('header.php') ?>
<?php include('sidebar.php') ?>
<?php include('../includes/config.php'); ?>
 
  <section class="content py-3"  >
        <div class="container-fluid">
        <!-- Info boxes -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box" style="background:white">
                        <span class="info-box-icon  elevation-1" style="background:white" ><i class="fas fa-graduation-cap " style="color:2b023e" ></i></span>

                            <a href="/Virtue_of_Excellence/admin/user_account.php?user=student" class ="text-dark">
                            <div class="info-box-content">
                                <span class="info-box-text">Total Students</span>
                                <span class="info-box-number">
                               <?php 
                               
                                $query = mysqli_query($db_conn,"SELECT COUNT(*) FROM accounts  WHERE `type` = 'student' AND `is_deleted`='0'");
                                $row = $query->fetch_assoc();
                                $students = implode(',', $row);
                                echo $students;
                               ?>
                                 
                        </span>
                            </div>
                            </a>
                            <!-- /.info-box-content -->
                            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3" style="background:white">
              <span class="info-box-icon elevation-1" style="background:white"><i class="fas fa-users"  style="color:2b023e"  ></i></span>

              <a href="/Virtue_of_Excellence/admin/user_account.php?user=teacher" class ="text-dark">
              <div class="info-box-content">
                <span class="info-box-text">Total Faculties</span>
                <span class="info-box-number">
                              <?php 
                               
                                $query = mysqli_query($db_conn,"SELECT COUNT(*) FROM accounts  WHERE `type` = 'teacher'  AND `is_deleted`='0'");
                                $row = $query->fetch_assoc();
                                $teachers = implode(',', $row);
                                echo $teachers;
                               ?>
                </span>
              </div>
              </a>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3" style="background:white">
              <span class="info-box-icon  elevation-1" style="background:white"><i class="fas fa-book" style="color:2b023e"></i></span>

              <a href="/Virtue_of_Excellence/admin/courses.php" class ="text-dark">
              <div class="info-box-content">
                <span class="info-box-text">Total Courses</span>
                <span class="info-box-number">
                              <?php 
                               
                               $query = mysqli_query($db_conn,"SELECT COUNT(*) FROM courses  WHERE `is_deleted`='0'");
                               $row = $query->fetch_assoc();
                               $courses = implode(',', $row);
                               echo $courses;
                              ?>
                </span>
              </div>
              </a>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3" style="background:white">
              <span class="info-box-icon  elevation-1" style="background:white"><i class="fas fa-bell" style="color:2b023e"></i></span>

              <div class="info-box-content">
                <span class="info-box-text text-dark">Total Staff</span>
                <span class="info-box-number text-dark">
                              <?php 
                               
                               $query = mysqli_query($db_conn,"SELECT COUNT(*)
                               FROM accounts
                               WHERE type = 'teacher' OR type = 'higherauthority'  AND `is_deleted`='0'");
                              
                               $row = $query->fetch_assoc();
                               $courses = implode(',', $row);
                               echo $courses;
                              ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        </div>
    </section>

      

    
<?php include('footer.php') ?>