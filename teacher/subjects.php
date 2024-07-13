<?php include('../includes/config.php') ?>
<?php include('header.php') ?>
<?php include('sidebar.php') ?>
 
<?php
   

  if(isset($_POST['submit']))
  {
    $class_id = isset($_POST['class']) ? $_POST['class'] : '';

    
    $class_query = mysqli_query($db_conn, "SELECT title FROM posts WHERE id = '$class_id'");
    $class_row = mysqli_fetch_assoc($class_query);
    $class = isset($class_row['title']) ? $class_row['title'] : '';

    $title = isset($_POST['subject']) ? $_POST['subject'] : '';
    
    $status = 'publish';
    $type = 'subject';
    $date_add = date('Y-m-d g:i:s');

    $query = mysqli_query($db_conn, "INSERT INTO `posts`(`title`,`status`,`publish_date`,`type`,`Class_onlyforsubject`) VALUES ('$title', '$status','$date_add','$type','$class_id') ")or die('Database_Error');
  }
  
?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Manage Subjects</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                     <li class="breadcrumb-item"><a href="http://localhost/Virtue_of_Excellence/teacher/dashboard.php">Teacher</a></li>
                    <li class="breadcrumb-item active">Subjects</li>
                </ol>
            </div><!-- /.col -->
            <?php 
            if(isset($_SESSION['success_msg']))
            {?>
                <div class="col-12">
              <small class="text-success" style="font-size:14px"><?=$_SESSION['success_msg']?>
              </small>
            </div>
           <?php 
           unset($_SESSION['success_msg']);
          }?>
        </div>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
            <div class="card">
                <div class="card-header py-2">
                    <h3 class="card-title">
                        Add New Subject
                    </h3>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="class">Select Class</label>
                            <select required name="class" id="class" class="form-control">
                            <option value="">-Select Class-</option>
                            <?php $query = mysqli_query($db_conn,"SELECT * from posts WHERE `type`= 'class' AND `is_deleted`= 0");
                            while($q = mysqli_fetch_object($query))  { 
                            ?>
                            <option value="<?=$q->id?>"><?=$q->title?></option>
                            <?php }?>
                            
                        </select>
                        </div>  
                        
                        <div class="form-group">
                            <label required for="subject">Subject Name</label>
                            <input type="text" name="subject" id="subject" placeholder="Subject Name" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" value="submit" class="btn btn-success btn-sm">
                        </div>
                    </form>
                </div>
            </div>

            </div>
            <div class="col-lg-8">
                 <div class="card ">
            <div class="card-header py-2">
                <h3 class="card-title">
                    Subjects
                </h3>
            </div>
            <div class="card-body">
            <table class="table table-bordered" >
    <thead>
        <tr>
            <th>S.No</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $count = 1;
    $args = array(
        'type'   => 'subject',
        'status' => 'publish',
        'is_deleted' => '0'
    );
    $subjects = get_posts($args);

    foreach ($subjects as $subject) {
        if ($subject->is_deleted == 1) {
            continue; // Skip deleted subjects
        }
    ?>
        <tr>
            <td><?= $count++ ?></td>
            <td><?= $subject->title ?></td>
            <td>
                <form method="post" action="">
                    <input type="hidden" name="deleted" value="<?= $subject->title ?>">
                    <?php if ($subject->is_deleted == 0): ?>
                        <button type="submit" name="delete" class="btn btn-danger btn-sm mx-1 px-3">Delete</button>
                    <?php endif; ?>
                </form>
            </td>
        </tr>
    <?php } ?>
</tbody>
</table>
            </div>
        </div>

            </div>
        </div>
       
        
        </div>
    </section>

    <?php
if (isset($_POST['delete'])) {
    $d = $_POST['deleted'];
    // Assuming $db_conn is your database connection object
    $d = mysqli_real_escape_string($db_conn, $d); // Sanitize input
    $delete_query = "UPDATE posts SET is_deleted = 1 WHERE title = '$d'";
    mysqli_query($db_conn, $delete_query);
}
?>


    
<?php include('footer.php') ?>