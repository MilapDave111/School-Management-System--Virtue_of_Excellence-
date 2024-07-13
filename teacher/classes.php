<?php include('../includes/config.php') ?>
<?php include('header.php') ?>
<?php include('sidebar.php')?>
<?php 
if(isset($_POST['submit'])) {
  $title = isset($_POST['title']) ? $_POST['title'] : '';
  $selectedSections = isset($_POST['section']) ? $_POST['section'] : [];

  $status = 'publish';
  $type = 'class';
  $date_add = date('Y-m-d g:i:s');

  $query1 = mysqli_query($db_conn, "INSERT INTO `posts`(`title`, `status`, `publish_date`, `type`)
                                  VALUES ('$title', '$status', '$date_add', '$type')")
                                  or die('Database_Error');

  $lastInsertId = mysqli_insert_id($db_conn);

  foreach ($selectedSections as $section) {
  $query2 = mysqli_query($db_conn, "INSERT INTO `meta_data`(`item_id`, `meta_key`, `meta_value`)
                                    VALUES ('$lastInsertId', 'section', '$section')")
                                    or die('Database_Error');
  }
}
?>
      

   
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0" style="color:#03285e">Manage Classes</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" >
            <ol class="breadcrumb float-sm-right">
              <li  class="breadcrumb-item"><a href="http://localhost/Virtue_of_Excellence/teacher/dashboard.php">Teacher</a></li>
              <li class="breadcrumb-item active">Classes</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">

        <?php
        if (isset($_REQUEST['action']))
        {?>
          <div class="card bg-white">
          <div class="card-header py-2">
              <h3 class="card-title text-bold">
                  Add New Class
              </h3>
            </div>
          <div class="card-body bg-white" >
              <form action="" method="POST">
                <div class="form-group"> 
                <label for="title">Title</label>  
                <input type="text" placeholder="Title" class="form-control bg-white" name="title" required>
                </div>
                <div class="form-group">
                <label for="title">Section</label> 

                <?php
                $count =1;
                $query = mysqli_query($db_conn, 'SELECT * FROM posts WHERE type="section" AND `is_deleted`= 0');
                while($Sections = mysqli_fetch_object($query)) { ?>
                  
                   <div>
                   <label for="<?=$count?>">
                   <input type="checkbox" id="<?=$count?>" value="<?=$Sections->id?>" name="section[]" placeholder="Section">
                   <?=$Sections->title?>
                   </label>
                   </div>
                  
                <?php 
              $count++;
              }?>
               
                </div>

                <button name="submit" class="btn btn-success">Submit</button>
              </form>
          </div>
      </div>
      <?php }
         else { ?>
        
        <div class="card bg-white text-bold" >
            <div class="card-header py-2">
                <h3 class="card-title text-bold">
                    Classes
                </h3>
                <div class="card-tools mx-1"><a href="?action=add-new" class="badge badge-success"><i class="fa fa-plus mr-2"> Add New</i></a></div>
            </div>
            <div class="card-body text-center">
                <table class="table table-bordered text-center" >
                  <thead>
                    <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Sections</th>
                  
                    <th>Action</th>
                    </tr>
                  </thead>
                  
                  <tbody>
    <?php 
    $count = 1;
    $args = array(
        'type'   => 'class',
        'status' => 'publish',
        'is_deleted' => '0'
    );

    $classes = get_posts($args);
    
    foreach ($classes as $class) {
        if ($class->is_deleted == 1) {
            continue; // Skip deleted rows
        }
        ?>
        <tr>
            <td><?=$count++?></td>
            <td><?=$class->title?></td>
            <td class="text-black ">
                <pre class="text-bold" >
                    <?php
                    $class_meta = get_meta_data($class->id, 'section');
                    foreach ($class_meta as $meta) {
                        $section = get_post(array('id' => $meta->meta_value));
                        echo $section->title;?>
                       <br>
                   <?php }
                    ?>  
                </pre>
            </td>
            
            <td>
                <form method="post" action="">
                    <input type="hidden" name="deleted" value="<?= $class->title ?>">
                    <?php if ($class->is_deleted == 0): ?>
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

        <?php } ?>

        <?php
if (isset($_POST['delete'])) {
    $d = $_POST['deleted'];
    
    $d = mysqli_real_escape_string($db_conn, $d); 
    $delete_query = "UPDATE posts SET is_deleted = 1 WHERE title = '$d'";
    mysqli_query($db_conn, $delete_query);
}
?>

        </div>
    </section>


    
<?php include('footer.php') ?>