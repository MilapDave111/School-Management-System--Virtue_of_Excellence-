<?php include('../includes/config.php') ?>
<?php include('header.php') ?>
<?php include('sidebar.php') ?>


    
     <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Attendance</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="http://localhost/Virtue_of_Excellence/admin/dashboard.php">Admin</a></li>
              <li class="breadcrumb-item active">Attendance</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
   
  <section class="content">
          <div class="container-fluid">
          <?php
if (isset($_POST['submit_attendance'])) {
  if (isset($_POST['rollno'])) {
      $rollnos = $_POST['rollno'];
      $attendance = (isset($_POST['attendance'])) ? $_POST['attendance'] : array();
      $date_add = date('Y-m-d g:i:s');
      $c_result = mysqli_query($db_conn, "SELECT MAX(count) as max_count FROM attendance");
      $max_count_row = mysqli_fetch_assoc($c_result);
      $max_count = $max_count_row['max_count'];
      $a = $max_count++;
            
      

      foreach ($rollnos as $key => $rollno) {
          $rollno = mysqli_real_escape_string($db_conn, $rollno);

          $status = (in_array($rollno, $attendance)) ? 'Present' : 'Absent';
          $type = 'student';
          

          $query = mysqli_query($db_conn, "INSERT INTO `attendance` (`meta_id`,`rollno`,`name`,`class`,`status`, `type`, `date`,`count`)
          SELECT acc.id, acc.rollno, acc.name, acc.class, ' $status', '$type', '$date_add', '$max_count'
          FROM accounts AS acc WHERE acc.type = 'teacher' AND acc.rollno = '$teacher_roll'");
      }

      if ($query) {
          echo "Attendance recorded successfully.";
      } else {
          echo "Error recording attendance.";
      }
  }
}
else { ?>
       <section class="content">
    <div class="container-fluid">
        <form action="" method="post">
            <table class="table-bordered text-center">
               <tr>
                <th>SrNo</th>
                <th>rollno</th>
                <th>Name</th>
                <th>Status</th>
               </tr>
                <tbody>
                    <?php
                    $count = 0;
                    $rollno = 0;
                    
                       $query = mysqli_query($db_conn, "SELECT * FROM accounts WHERE `type` = 'teacher' AND `is_deleted` = '0' ORDER BY `name` ASC");
                        while ($queryy = mysqli_fetch_object($query)) {
                            $url = $queryy->rollno;
                            ?>
                            <tr>
                                <td><?= ++$count ?></td>
                                <td><?= $queryy->teacher_roll ?></td>
                                <td><?= $queryy->name ?></td>
                                <td>
                                    <input type="hidden" name="rollno[]" value="<?= $queryy->rollno ?>">
                                    <input type="checkbox" value="<?= $queryy->rollno ?>" name="attendance[]">
                                </td>
                            </tr>
                       
                  <?php  } ?>
                </tbody>
            </table>
            <input type="submit" name="submit_attendance" value="Submit Attendance">
        </form>
    </div>
</section>
 
       
          <?php }  ?>



<?php

          // Get total sessions for each student
$query = mysqli_query($db_conn, "SELECT rollno, COUNT(*) AS total_sessions
FROM attendance
WHERE type = 'student'
GROUP BY rollno");

$totalSessionsData = array();
while ($row = mysqli_fetch_assoc($query)) {
$totalSessionsData[$row['rollno']] = $row['total_sessions'];
}

// Get total absent sessions for each student
$query = mysqli_query($db_conn, "SELECT rollno, COUNT(*) AS total_absent
FROM attendance
WHERE type = 'student' AND status = 'Absent'
GROUP BY rollno");

$totalAbsentData = array();
while ($row = mysqli_fetch_assoc($query)) {
$totalAbsentData[$row['rollno']] = $row['total_absent'];
}

// Display attendance percentage
foreach ($totalSessionsData as $rollno => $totalSessions) {
$totalAbsent = isset($totalAbsentData[$rollno]) ? $totalAbsentData[$rollno] : 0;

$attendancePercentage = (($totalSessions - $totalAbsent) / $totalSessions) * 100;

$query = mysqli_query($db_conn,"UPDATE attendance SET `percent` = $attendancePercentage WHERE `rollno` = '$rollno'");
}
?>




</section>


<?php include('footer.php') ?>