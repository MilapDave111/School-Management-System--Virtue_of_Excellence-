<?php include('../includes/config.php') ?>
<?php include('header.php') ?>
<?php include('sidebar.php') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0" style="color:#03285e"> Courses</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="http://localhost/Virtue_of_Excellence/student/dashboard.php">Student</a></li>
                    <li class="breadcrumb-item active">Course</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
    <div class="container-fluid">

       
            

            <div class="card bg-white">
                <div class="card-header py-2">
                    <h3 class="card-title">
                        Courses
                    </h3>
                    
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
                                    
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

        <?php ?>
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
