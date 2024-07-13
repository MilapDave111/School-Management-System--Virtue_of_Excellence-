<?php include('../includes/config.php') ?>
<?php include('header.php') ?>
<?php include('sidebar.php') ?>

<?php
    if(isset($_POST['submit']))
{
$title = isset($_POST['title'])?$_POST['title']:'';
$status = 'publish';
$type = 'section';
$date_add = date('Y-m-d g:i:s');

$query = mysqli_query($db_conn, "INSERT INTO `posts`(`title`,`status`,`publish_date`,`type`) VALUES ('$title', '$status','$date_add','$type')")or die('Database_Error');
}
?>

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0" style="color:#03285e">Manage Sections</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="http://localhost/Virtue_of_Excellence/teacher/dashboard.php">Teacher</a></li>
              <li class="breadcrumb-item active">Sections</li>
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
          <div class='col-lg-8'>
            
            <!-- Info boxes -->
            <div class="card">
              <div class="card-header py-2">
                <h3 class="card-title">
                  Sections
                </h3>
                <div class="card-tools">
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive bg-white">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>S.No.</th>
                        <th>Title</th>
                        <th>Action</th>
                      </tr>
                    </thead>

                    <tbody>
    <?php
    $args = array(
      'type' => 'section',
      'status' => 'publish',
      'is_deleted' => '0'
  );
  $sections = get_posts($args);
    $count = 1;
    foreach ($sections as $section) {
        if ($section->is_deleted == 0) { // Check if the section is not deleted
            ?>
            <tr>
                <td><?= $count++ ?></td>
                <td><?= $section->title ?></td>
                <td>
                    <form method="post" action="">
                        <input type="hidden" name="deleted" value="<?= $section->title ?>">
                        <?php if ($section->is_deleted == 0): ?>
                            <button type="submit" name="delete" class="btn btn-danger btn-sm mx-1 px-3">Delete</button>
                        <?php endif; ?>
                    </form>
                </td>
            </tr>
            <?php
        }
    }
    ?>
</tbody>


                  </table>
                </div>
              </div>
            </div>
          </div>

          <?php
      if (isset($_POST['delete'])) {
        $d = $_POST['deleted'];
        // Assuming $db_conn is your database connection object
        $d = mysqli_real_escape_string($db_conn, $d); // Sanitize input
        $delete_query = "UPDATE posts SET is_deleted = 1 WHERE title = '$d'";
        mysqli_query($db_conn, $delete_query);
    }
      ?>
         
        

          <div class="col-lg-4">
            <!-- Info boxes -->
            <div class="card">
              <div class="card-header py-2">
                <h3 class="card-title">
                  Add New Section
                </h3>
              </div>
              <div class="card-body">
                <form action="" method="POST">
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" placeholder="Title" required class="form-control">
                  </div>
                  
                  <button name="submit" class="btn btn-success float-right">
                    Submit
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>   

      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
<?php include('footer.php') ?>