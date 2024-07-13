<?php include('../includes/config.php') ?>

<?php
if(isset($_POST['submit'])) {
    // Insert new event into the database
    $title = isset($_POST['title'])?$_POST['title']:'';
    $date = isset($_POST['date'])?$_POST['date']:'';
    $time = isset($_POST['time'])?$_POST['time']:'';
    $venue = isset($_POST['venue'])?$_POST['venue']:'';
    $desc = isset($_POST['desc'])?$_POST['desc']:'';

    $query = mysqli_query($db_conn,"INSERT INTO events (`name`,`date`,`time`,`venue`,`description`) VALUES('$title','$date','$time','$venue','$desc')");
}

if (isset($_POST['delete'])) {
    // Handle delete button click
    $eventId = $_POST['deleted'];
    $eventId = mysqli_real_escape_string($db_conn, $eventId); 
    $delete_query = "UPDATE events SET is_deleted = 1 WHERE id = $eventId";
    mysqli_query($db_conn, $delete_query);
}
?>

<?php include('header.php') ?>
<?php include('sidebar.php') ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0" style="color:#03285e">Manage Events</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="http://localhost/Virtue_of_Excellence/admin/dashboard.php">Admin</a></li>
                    <li class="breadcrumb-item active">Events</li>
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
                        <h3 class="card-title">Events</h3>
                        <div class="card-tools">
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Title/Name</th>
                                    <th>Date</th>
                                    <th>Venue</th>
                                    <th>Time</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count=1;
                                $query=mysqli_query($db_conn, 'SELECT * FROM events');
                                while($q = mysqli_fetch_object($query)) {?>
                                <?php if ($q->is_deleted == 0): ?>
                                <tr>
                                    <td><?=$count++?></td>
                                    <td><?=$q->name?></td>
                                    <td><?=$q->date?></td>
                                    <td><?=$q->venue?></td>
                                    <td><?=$q->time?></td>
                                    <td><?=$q->description?></td>
                                    <td>
                                        <form method="post" action="">
                                            <input type="hidden" name="deleted" value="<?= $q->id ?>">
                                            <button type="submit" name="delete" class="btn btn-danger btn-sm mx-1 px-3">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endif; ?>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card bg-white">
                    <div class="card-header py-2">
                        <h3 class="card-title">Add New Event</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label>Title/Name</label>  
                                <input required type="text" placeholder="Title" class="form-control" name="title" require>
                            </div>
                            <div class="form-group">
                                <label for="from">Date</label>  
                                <input required type="date"class="form-control" name="date" require>
                            </div>
                            <div class="form-group">
                                <label for="to">Time</label>  
                                <input type="time" name="time" id="time" class="form-control" placeholder="time">
                            </div>
                            <div class="form-group">
                                <label for="to">Description</label>  
                                <input required type="text" placeholder="Desc..." class="form-control" name="desc" require>
                            </div>
                            <div class="form-group">
                                <label for="to">Venue</label>  
                                <select class="form-control" name="venue">
                                    <option value="Auditorium">Auditorium</option>
                                    <option value="Ground">Ground</option>
                                </select>
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
