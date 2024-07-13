<?php include('../includes/config.php') ?>

<?php
    if(isset($_POST['submit']))
    {
      $title = isset($_POST['title'])?$_POST['title']:'';
      $from = isset($_POST['from'])?$_POST['from']:'';
      $to = isset($_POST['to'])?$_POST['to']:'';
      $status = 'publish';
      $type = 'period';
      $date_add = date('y-m-d g:i:s');

      $query = mysqli_query($db_conn,"INSERT INTO posts (`title`,`status`,`publish_date`,`type`) VALUES('$title','$status','$date_add','$type') ");

     if($query)
     {
       $item_id = mysqli_insert_id($db_conn);
     }

     mysqli_query($db_conn,"INSERT INTO meta_data (`meta_key`,`meta_value`,`item_id`) 
     VALUES('from','$from','$item_id') ");
     mysqli_query($db_conn,"INSERT INTO meta_data (`meta_key`,`meta_value`,`item_id`) 
     VALUES('to','$to','$item_id') ");

     echo 'inserted';
     header('Location:periods.php');
    }
?>

<?php include('header.php') ?>
<?php include('sidebar.php') ?>
   
   
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0" style="color:#03285e">Manage Periods</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="http://localhost/Virtue_of_Excellence/teacher/dashboard.php">Teacher</a></li>
              <li class="breadcrumb-item active">periods</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                
      
        
        <div class="card bg-white">
            <div class="card-header py-2">
                <h3 class="card-title">
                Periods
                </h3>
                <div class="card-tools">
                    
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered" >
                  <thead>
                    <tr>
                    <th>S.No</th>
                    <th>Title</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
    <?php 
    $count = 1;
    $args = array(
        'type' => 'period',
        'status' => 'publish',
        'is_deleted' => '0'
    );
    $periods = get_posts($args);

    foreach ($periods as $period) {
        $from = get_meta_data($period->id, 'from')[0]->meta_value;
        $to = get_meta_data($period->id, 'to')[0]->meta_value;
        $is_deleted = $period->is_deleted;

        // Add a class based on the is_deleted status
        $row_class = ($is_deleted == 1) ? 'hidden-row' : '';

        ?>
        <tr class="<?=$row_class?>">
            <td><?=$count++?></td>
            <td><?=$period->title?></td>
            <td><?php echo date('h:i A', strtotime($from))?></td>
            <td><?php echo date('h:i A', strtotime($to))?></td>
            <td>
                <form method="post" action="">
                    <input type="hidden" name="deleted" value="<?= $period->title ?>">
                    <?php if ($is_deleted == 0): ?>
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

                <?php
if (isset($_POST['delete'])) {
    $d = $_POST['deleted'];
    // Assuming $db_conn is your database connection object
    $d = mysqli_real_escape_string($db_conn, $d); // Sanitize input
    $delete_query = "UPDATE posts SET is_deleted = 1 WHERE title = '$d'";
    mysqli_query($db_conn, $delete_query);
}
?>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Hide rows with the 'hidden-row' class on page load
        var hiddenRows = document.querySelectorAll('.hidden-row');
        hiddenRows.forEach(function (row) {
            row.style.display = 'none';
        });
    });
</script>

                <div class="col-lg-4">
                <div class="card bg-white">
          <div class="card-header py-2">
              <h3 class="card-title">
                  Add New Period
              </h3>
            </div>
          <div class="card-body">
              <form action="" method="POST">
              <div class="form-group">
                <label for="title">Title</label>  
                <input required type="text" placeholder="Title" class="form-control" name="title" require>
                </div>
                <div class="form-group">
                <label for="from">From</label>  
                <input required type="time" placeholder="Time" class="form-control" name="from" require>
                </div>
                <div class="form-group">
                <label for="to">To</label>  
                <input required type="time" placeholder="Time" class="form-control" name="to" require>
                </div>
                
                

                <button name="submit" value="submit"class="btn btn-success float-right">Submit</button>
              </form>
          </div>
      </div>
                </div>
            </div>
        
          
        </div>
    </section>


    
<?php include('footer.php') ?>