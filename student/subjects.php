<?php include('../includes/config.php') ?>
<?php include('header.php') ?>
<?php include('sidebar.php') ?>
 


<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Subjects</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="http://localhost/Virtue_of_Excellence/student/dashboard.php">Student</a></li>
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
        
            <div class="card">
                <div class="card-header py-2">
               
           
                 
            <div class="card-header py-2">
                <h3 class="card-title">
                    Subjects
                </h3>
            </div>
           
           
         
          <?php 
    $user_data = get_user_data($std_id);

    $q = mysqli_query($db_conn, "SELECT p.title FROM posts AS p INNER JOIN accounts AS a ON a.class = p.id WHERE a.id = $std_id");

    if ($q) {
        $q_row = mysqli_fetch_assoc($q);

        if ($q_row) {
            // echo $q_row['title'];
        } else {
            echo "No posts found for the user.";
        }
    } else {
        echo "Query failed: " . mysqli_error($db_conn);
    }
?>

            
            
            
            <table class="table table-bordered" >
    <thead>
        <tr>
            <th>S.No</th>
            <th>Name</th>
            
        </tr>
    </thead>
    <tbody>
    <?php


$q = mysqli_query($db_conn, "SELECT p.* 
                             FROM posts AS p
                             INNER JOIN accounts AS a ON a.class = p.Class_onlyforsubject
                             WHERE a.id = '$std_id' AND p.type = 'subject' AND p.is_deleted='0'");

// Output the SQL query for debugging
// echo "SQL Query: " . "SELECT p.* FROM posts AS p INNER JOIN accounts AS a ON a.class = p.Class_onlyforsubject WHERE a.id = '$std_id' AND p.type = 'subject'";

$count = 1; // Initialize the counter outside the loop

// Output the number of rows returned for debugging
// echo "Number of Rows: " . mysqli_num_rows($q);

while ($a = mysqli_fetch_object($q)) {
    ?>
    <tr>
        <td><?= $count++ ?></td>
        <td><?= $a->title ?></td>
    </tr>
    <?php
}
?>

    </tbody>
</table>
            </div>
        </div>

            </div>
        </div>
       
        
        </div>
    </section>


    
<?php include('footer.php') ?>