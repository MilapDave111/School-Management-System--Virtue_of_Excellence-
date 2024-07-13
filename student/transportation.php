<?php include('../includes/config.php') ?>
<?php include('header.php') ?>
<?php include('sidebar.php') ?>
<?php 
          $othermeta = get_user_meta_data($std_id);
          $student = get_user_data1($std_id);
          ?>
        <div class="card">
          
          <div class="card-body"> 
            <strong>Name: </strong> <?php echo get_users(array('id'=>$std_id))[0]->name ?> <br>
            <strong>Rollno: </strong> <?php echo get_users(array('id'=>$std_id))[0]->rollno ?>
          </div>
        </div>

        <section class="content">
    <div class="container-fluid">
    <div class="card">
        <div class="card-body">
        <table class="table table-bordered">
    <thead>
        <tr>
            <th>SrNo</th>
            <th>RollNo</th>
            <th>Pick-up</th>
            <th>Drop-off</th>
            <th>Driver Name</th>
            <th>Number plate</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $a = get_users(array('id'=>$std_id))[0]->rollno;
        $query = mysqli_query($db_conn, "SELECT ts.rollno, ts.bus_num, ts.pick_up, ts.drop_off, td.name 
        AS driver_name, tb.no_plate FROM transport_student ts JOIN transport_driver td 
        ON ts.bus_num = td.bus_num JOIN transport_bus tb ON ts.bus_num = tb.bus_num 
        WHERE ts.rollno = '$a'");
        $count = 0;

        if (!$query) {
            echo "Error in query execution: " . mysqli_error($db_conn);
        } else {
            while ($queryy = mysqli_fetch_object($query)) {
                $count++;
        ?>
                <tr>
                    <td><?= $count ?></td>
                    <td><?= $queryy->rollno ?></td>
                    <td><?= $queryy->pick_up ?></td>
                    <td><?= $queryy->drop_off ?></td>
                    <td><?= $queryy->driver_name ?></td>
                    <td><?= $queryy->no_plate ?></td>
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
        </section>
           
<?php include('footer.php') ?>