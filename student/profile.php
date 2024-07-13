<?php include('../includes/config.php') ?>
<?php include('header.php') ?>
<?php include('sidebar.php') ?>


     <!-- Content Header (Page header) -->
     <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="http://localhost/Virtue_of_Excellence/student/dashboard.php">Student</a></li>
              <li class="breadcrumb-item active">Profile</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
            <div class="card">
            
             
              
              
          <div class="card-body">
          <div class="table-responsive bg-white">
          <table class="table 
          
          
          
          
          
          
          
          
          
          
          ">
            
              
            
            <tbody >
                <?php 
                $user_data = get_user_data($std_id);

                $q = mysqli_query($db_conn, "SELECT * FROM othermeta AS p INNER JOIN accounts AS a ON a.email = p.email WHERE a.id = $std_id ");
                while ($a = mysqli_fetch_object($q)) {
                    // Fetch class and section names from the posts table using class_id and section_id from manage_student table
                    $class_query = mysqli_query($db_conn, "SELECT title FROM posts WHERE id = (SELECT class FROM accounts WHERE rollno = $a->rollno)");
                    $class = mysqli_fetch_object($class_query);
                    
                    $section_query = mysqli_query($db_conn, "SELECT title FROM posts WHERE id = (SELECT section FROM manage_students_sections WHERE rollno = $a->rollno)");
                    $section = mysqli_fetch_object($section_query);
                    ?>
                    <tr>
                        <th>Full Name :</th>
                        <td><?php echo $a->name?></td>
                    </tr>
                    <tr>
                        <th>Mother's Name :</th>
                        <td><?php echo $a->mother_name?></td>
                    </tr>
                    <tr>
                        <th>Father's Name :</th>
                        <td><?php echo $a->father_name?></td>
                    </tr>
                    <tr>
                        <th>Enrollment No :</th>
                        <td><?php echo $a->rollno?></td>
                    </tr>
                    <tr>
                        <th>Email :</th>
                        <td><?php echo $a->email?></td>
                    </tr>
                    <tr>
                        <th>Class :</th>
                        <td><?php echo $class->title;?></td>
                    </tr>
                    <tr>
                        <th>Section :</th>
                        <td><?php echo $section->title;?></td>
                    </tr>
                    <tr>
                        <th>Address :</th>
                        <td><?php echo $a->address?></td>
                    </tr>
                    <tr>
                        <th>DOB :</th>
                        <td><?php echo $a->dob?></td>
                    </tr>
                    <tr>
                        <th>Contact NO :</th>
                        <td><?php echo $a->mobile?></td>
                    </tr>
                <?php }?>
            </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
</section>
<?php include('footer.php') ?>