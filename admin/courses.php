<?php include('../includes/config.php') ?>
<?php include('header.php') ?>
<?php include('sidebar.php') ?>
<?php
  if(isset($_POST['submit']))
  {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $duration = $_POST['duration'];
    $image = $_FILES["thumbnail"]["name"];
    $today = date('Y-m-d');
    
    $target_dir = "../dist/uploads/";
    $target_file = $target_dir . basename($_FILES["thumbnail"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $uploadOk = 1;

    // Check if file already exists
    

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file)) {
        mysqli_query($db_conn, "INSERT INTO courses (`name`, `category`, `duration`,`image`, `date`) VALUES ('$name', '$category', '$duration', '$image', '$today')") or die(mysqli_error($db_conn));
        echo " Successfully File Uploaded";
       
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
    
          }
?>


<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0" style="color:#03285e">Manage Courses</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="http://localhost/Virtue_of_Excellence/admin/dashboard.php">Admin</a></li>
                    <li class="breadcrumb-item active">Course</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
      <div class="container-fluid">
        <?php
        if (isset($_REQUEST['action'])) { ?>
        <!-- Info boxes -->
        <div class="card">
          <div class="card-header py-2">
            <h3 class="card-title">
              Add New Course
            </h3>
          </div>
          <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data" id="myform">
              <div class="form-group">
                <label for="name">Course Name</label>
                <input type="text" name="name" placeholder="Course Name" required class="form-control">
              </div>
              <div class="form-group">
                <label for="category">Course Category</label>
                <select name="category" id="category" class="form-control">
                  <option value="">Select Category</option>
                  <option value="web-design-and-development">Web Design & Development</option>
                  <option value="app-developement">App Development</option>
                  <option value="web-design-and-development">Software Testing</option>
                  <option value="app-developement">Graphic Design</option>
                  <option value="web-design-and-development">Artificial Intelligence</option>
                  <option value="app-developement">Machine Learning</option>
                  <option value="web-design-and-development">Bioinformtics</option>
                  <option value="app-developement">Cyber Security</option>
                </select>
              </div>
              <div class="form-group">
                <label for="duration">Course Duration</label>
                <input type="text" name="duration" id="duration" class="form-control" placeholder="Course Duration" required>
              </div>
              <div class="form-group">
                <input type="file" name="thumbnail" id="thumbnail" required>
              </div>
              <button name="submit" type="submit" class="btn btn-success">
                Submit
              </button>
            </form>
            
          </div>
        </div>
        <!-- /.row -->
        <?php }else{?>
        <!-- Info boxes -->
        <div class="card bg-white">
                <div class="card-header py-2">
                    <h3 class="card-title">
                        Courses
                    </h3>
                    <div class="card-tools"><a href="?action=add-new" class="badge badge-success"><i class="fa fa-plus mr-2"> Add New</i></a></div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" >
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Category</th>
                                <th>Duration</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $count = 1;
                            $curse_query = mysqli_query($db_conn, 'SELECT * FROM courses WHERE is_deleted = 0');

                            while ($course = mysqli_fetch_object($curse_query)) {
                                ?>
                                <tr>
                                    <td><?= $count++ ?></td>
                                    <td><?= $course->name ?></td>
                                    <td><img src="../dist/uploads/<?= $course->image ?>" height="100" alt=""></td>
                                    <td><?= $course->category ?></td>
                                    <td><?= $course->duration ?></td>
                                    <td><?= $course->date ?></td>
                                    <td>
                                        <form method="post" action="">
                                            <input type="hidden" name="isdelete" value="<?= $course->id ?>">
                                            <button type="submit" name="delete" class="btn btn-danger btn-sm mx-1 px-3">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

        <?php } ?>
    </div>
</section>

<?php
if (isset($_POST['delete'])) {
    $course_id = $_POST['isdelete'];
    $delete_query = "UPDATE courses SET is_deleted = 1 WHERE id = $course_id";
    mysqli_query($db_conn, $delete_query);
}
?>

<?php include('footer.php') ?>
