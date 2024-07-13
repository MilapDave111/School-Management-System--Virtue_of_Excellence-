<?php include('../includes/config.php') ?>
<?php
  // Get other form values
   $rollno = isset($_GET['action']) ? $_GET['action'] : '';
   $subject = isset($_GET['subject']) ? $_GET['subject'] : '';

if (isset($_POST['result_submit'])) {
  // Get all the marks from the form
  $marks = array(
      isset($_POST['mark1']) ? intval($_POST['mark1']) : 0,
      isset($_POST['mark2']) ? intval($_POST['mark2']) : 0,
      isset($_POST['mark3']) ? intval($_POST['mark3']) : 0,
      isset($_POST['mark4']) ? intval($_POST['mark4']) : 0,
      isset($_POST['mark5']) ? intval($_POST['mark5']) : 0,
      isset($_POST['mark6']) ? intval($_POST['mark6']) : 0,
      isset($_POST['mark7']) ? intval($_POST['mark7']) : 0,
      isset($_POST['mark8']) ? intval($_POST['mark8']) : 0,
      isset($_POST['mark9']) ? intval($_POST['mark9']) : 0,
      isset($_POST['mark10']) ? intval($_POST['mark10']) : 0,
      isset($_POST['mark11']) ? intval($_POST['mark11']) : 0,
      isset($_POST['mark12']) ? intval($_POST['mark12']) : 0
  );
 
  // Calculate the total
  $total = array_sum($marks);
   
   $q1 = mysqli_query($db_conn, "SELECT COUNT(*) AS row_count FROM result WHERE `rollno` = '$rollno'");
   $r1 = mysqli_fetch_array($q1);
   $rowCount = $r1['row_count'];
   //  echo "Number of rows for rollno $rollno: $rowCount";
  
  

  $sumQuery = mysqli_query($db_conn, "SELECT SUM(total) AS total_sum FROM result WHERE `rollno` = '$rollno'");
  $sumResult = mysqli_fetch_assoc($sumQuery); 
  $totalSum = $sumResult['total_sum'];
  
  $count = $totalSum + $total;
  
  $percentage = $count / ($rowCount + 1);
  
  $a_id1 = mysqli_query($db_conn, "SELECT * from accounts as a 
            inner join result as r on a.rollno = $rollno  ");

  $acc_id2 = mysqli_fetch_array($a_id1); 
  $acc_id  = $acc_id2[0];
  // echo '<pre>';
  // echo print_r($acc_id);
  // echo '<pre>';

  // Insert data into the database
  $queryyy = mysqli_query($db_conn, "INSERT INTO result (`acc_id`,`rollno`,`q1a`,`q1b`,`q2a`,`q2b`,`q3a`,`q3b`,`q4a`,`q4b`,`q5a`,`q5b`,`q6a`,`q6b`,`total`,`subject`,`count`,`percentage`)
  VALUES ('$acc_id', '$rollno', '{$marks[0]}', '{$marks[1]}', '{$marks[2]}', '{$marks[3]}', '{$marks[4]}', '{$marks[5]}', '{$marks[6]}', '{$marks[7]}', '{$marks[8]}', '{$marks[9]}', '{$marks[10]}', '{$marks[11]}', '$total', '$subject', '$count', '$percentage')");
  
  if($queryyy){
    mysqli_query($db_conn, "DELETE FROM result WHERE `result`.`total` = 0 AND `rollno` = '$rollno'" );
  }
  
}
?>



<?php include('header.php') ?>
<?php include('sidebar.php') ?>


     <!-- Content Header (Page header) -->
     <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Result
                
                <!-- <a href="?action=update" class="btn btn-success btn-sm"> Update </a>
                <a href="?action=delete" class="btn btn-success btn-sm"> Delete </a> -->

              </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="http://localhost/Virtue_of_Excellence/teacher/dashboard.php">Teacher</a></li>
              <li class="breadcrumb-item active">Result</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
   
  <section class="content">
          <div class="container-fluid">
            <?php  if(isset($_GET['action']) && $_GET['action'] != '$url&subject=$subjectName') {
              $rollno = $_GET['action'];
              $query = mysqli_query($db_conn, "SELECT * FROM accounts WHERE `type` = 'student' AND `is_deleted` = '0' AND `rollno` = '$rollno'");
              $student = mysqli_fetch_object($query);
              if ($student) {
                  $rollno = $student->rollno;
                  $name = $student->name;
                  $class = $student->class;
              }
              ?>
              <div class="card">
                <div class="card-body">
                 <form action="" method="post">
                 <table  width="100%" class=" text-center ">
                  <thead></thead>
                  <tbody>
                  <tr>
                    <th>Q1.A</th>
                    <th>Q1.B</th>
                    <th>Q2.A</th>
                    <th>Q2.B</th>
                    <th>Q3.A</th>
                    <th>Q3.B</th>
                    </tr>
                  <tr>
                    <th><input class="text-sm" type="text" name="mark1"></th>
                    <th><input class="text-sm" type="text" name="mark2"></th>
                    <th><input class="text-sm" type="text" name="mark3"></th>
                    <th><input class="text-sm" type="text" name="mark4"></th>
                    <th><input class="text-sm" type="text" name="mark5"></th>
                    <th><input class="text-sm" type="text" name="mark6"></th>
                  </tr>
                  <tr>
                    <td>&nbsp</td>
                    <td>&nbsp</td>
                    <td>&nbsp</td>
                    <td>&nbsp</td>
                    <td>&nbsp</td>
                    <td>&nbsp</td>
                  </tr>
                  <tr>
                    <th>Q4.A</th>
                    <th>Q4.B</th>
                    <th>Q5.A</th>
                    <th>Q5.B</th>
                    <th>Q6.A</th>
                    <th>Q6.B</th>
                    </tr>
                    <tr>
                    <th><input class="text-sm" type="text" name="mark7"></th>
                    <th><input class="text-sm" type="text" name="mark8"></th>
                    <th><input class="text-sm" type="text" name="mark9"></th>
                    <th><input class="text-sm" type="text" name="mark10"></th>
                    <th><input class="text-sm" type="text" name="mark11"></th>
                    <th><input class="text-sm" type="text" name="mark12"></th>
                  </tr>
                  <tr>
                    <td>&nbsp</td>
                    <td>&nbsp</td>
                    <td>&nbsp</td>
                    <td>&nbsp</td>
                    <td>&nbsp</td>
                    <td>&nbsp</td>
                  </tr>
                  <tr>
    <!-- <td>Subject:</td> -->
    <td>
        <!-- name="subject_dropdown" id="subject_dropdown" onchange="updateSubjectTitle(this)"> -->
        <?php
            // Fetch and display dynamic subject options
            $subjectQuery = mysqli_query($db_conn, "SELECT DISTINCT title FROM posts WHERE type='subject' AND Class_onlyforsubject = '$class'");
            while ($subject = mysqli_fetch_assoc($subjectQuery)) {
                // echo "<option value='{$subject['title']}'>{$subject['title']}</option>";
            }
            ?>
       
    </td>

                  <td><button class="btn btn-success" name="result_submit">Submit</button></td>
                  </tr>
                  
                  </tbody>
                 </table>
                 </form>
              </div>
            </div>
          <?php } else { ?>
        

<?php
if (isset($_POST['standard'])) {
  $class = $_POST['class'];
  $c = $class;
?>
 
    <div class="card">
      <div class="card-body">
      <table class="table-bordered text-center" width="100%">
        <thead>
            <tr>
                <th>SrNo</th>
                <th>rollno</th>
                <th>Name</th>
                
                <?php
                // Fetch and display dynamic subject columns
                $subjectQuery = mysqli_query($db_conn, "SELECT DISTINCT title FROM posts WHERE type='subject' AND Class_onlyforsubject = '$class'");
                while ($subject = mysqli_fetch_assoc($subjectQuery)) {
                    echo "<td>{$subject['title']}</td>";
                }
                ?>
            </tr>
        </thead>
        <tbody>
        <?php
$count = 0;
$section = isset($_POST['section']) ? $_POST['section'] : '';


$query = mysqli_query($db_conn, "SELECT * FROM manage_students_sections AS m
          INNER JOIN accounts AS a ON m.rollno = a.rollno
          WHERE a.class = '$class' AND m.section = '$section'
");

if (!$query) {
    die("Query failed: " . mysqli_error($db_conn));
}

while ($queryy = mysqli_fetch_object($query)) {
    $url = $queryy->rollno;
    ?>
    <tr>
        <td><?= ++$count ?></td>
        <td><?= $queryy->rollno ?></td>
        <td><?= $queryy->name ?></td>
        
        <?php
        // Fetch and display buttons for each subject
        $subjectQuery = mysqli_query($db_conn, "SELECT DISTINCT title FROM posts WHERE type='subject' AND Class_onlyforsubject = '$class'");
        
        if (!$subjectQuery) {
            die("Subject query failed: " . mysqli_error($db_conn));
        }

        while ($subject = mysqli_fetch_assoc($subjectQuery)) {
            $subjectName = $subject['title'];
            echo "<td><a href='?action=$url&subject=$subjectName' class='btn btn-success btn-sm' name='mark'>Add Marks</a></td>";
        }
        ?>
    </tr>
<?php
}

?>

        </tbody>
    </table>
      </div>
    </div>
<?php }  else { ?>

<form action="" method="post">
<div class="form-group">
<div class="row">
<div class="col-lg-3">
<select name="class" id="class" class="form-control">
            <option value="">Select Class</option>
            <?php 
            $query = mysqli_query($db_conn, "SELECT * FROM posts WHERE `type` = 'class' AND `is_deleted`= 0");
            while ($queryy = mysqli_fetch_object($query)) {
                ?>
                <option value="<?= $queryy->id ?>"><?= $queryy->title ?></option>
            <?php } ?>
        </select>
</div>
        <div class="col-lg-3">
        <select name="section" id="section" class="form-control">
            <option value="">Select Section</option>
            <?php 
            $query = mysqli_query($db_conn, "SELECT * FROM posts WHERE `type` = 'section' AND `is_deleted`= 0");
            while ($queryy = mysqli_fetch_object($query)) {
                ?>
                <option value="<?= $queryy->id ?>"><?= $queryy->title ?></option>
            <?php } ?>
        </select>
        </div>

   <div class="col-lg-3">
   <button value="$queryy->id" name="standard" class="form-control btn btn-success">Submit</button>
   </div>
</div>
</div>
</form>
<?php } }?>
  </section>
<script>
jQuery(document).ready(function(){

  jQuery('#class_id').change(function(){
    // alert(jQuery(this).val());

    jQuery.ajax({
      url:'ajax.php',
      type : 'POST',
      data  : {'class_id':jQuery(this).val()},
      dataType : 'json',
      success: function(response){
        if(response.count > 0)
        {
          jQuery('#section-container').show();        
        }
        else
        {
          jQuery('#section-container').hide();
        }
        jQuery('#section_id').html(response.options); 
      }
    });
  });

})
</script>

<?php include('footer.php')?>