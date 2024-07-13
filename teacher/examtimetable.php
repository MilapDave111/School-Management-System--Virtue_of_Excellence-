<?php include('../includes/config.php') ?>

<?php
if(isset($_POST['submit']))
{
    $class_id = isset($_POST['class'])?$_POST['class']:'';
   
    $teacher_id = isset($_POST['teacher_id'])?$_POST['teacher_id']:'';
    $subject_id = isset($_POST['subject_id'])?$_POST['subject_id']:'';
    
    $date = isset($_POST['date'])?$_POST['date']:'';
    $location = isset($_POST['location'])?$_POST['location']:'';
    $to = isset($_POST['to'])?$_POST['to']:'';
    $from = isset($_POST['from'])?$_POST['from']:'';
    
    
    $query = mysqli_query($db_conn, "INSERT INTO exam (`class`,`subject`,`teacher`,`location`,`date`,`from`,`to`) 
    VALUES ('$class_id','$subject_id','$teacher_id','$location','$date','$from','$to')");
    header('Location:examtimetable.php');
    }
?>

<?php include('header.php') ?>
<?php include('sidebar.php') ?>


     <!-- Content Header (Page header) -->
     <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Exam Time Table
                <a href="?action=add" class="btn btn-success btn-sm"> Add New </a>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="http://localhost/Virtue_of_Excellence/teacher/dashboard.php">Teacher</a></li>
              <li class="breadcrumb-item active">Exam Time Table</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
   
    <section class="content">
    <div class="container-fluid">
        <?php  if(isset($_GET['action']) && $_GET['action'] == 'add') {?>
            <div class="card">
                <div class="card-body">
                    <form action="" method="post">
                       
                                                
                                            <div class="form-group">
                                            <label for="class">Select Class</label>
                                                    <select name="class" id="class" class="form-control">
                                                        <option value="">-Select Class-</option>
                                                        <?php
                                                        $args = array(
                                                        'type' => 'class',
                                                        'status' => 'publish',
                                                        'is_deleted' => '0'
                                                        );
                                                        $classes = get_posts($args); 
                                                        foreach ($classes as $key => $class) { ?>
                                                        <option value="<?php echo $class->id ?>"><?php echo $class->title ?></option>
                                                        <?php } ?>

                                                    </select> 
                                            </div>
                                       
                                                 <div class="form-group" id="section-container">
                                                        <label for="teacher_id">Select Teacher</label>
                                                        <select require name="teacher_id" id="teacher_id" class="form-control">
                                                            <option value="">-Select Teacher-</option>
                                                            <?php
                                                                $args = array(
                                                                    'type' => 'teacher',
                                                                    'status' => 'publish',
                                                                    'is_deleted' => '0'
                                                                );
                                                                $teachers = get_the_teachers($args); 
                                                                foreach ($teachers as $key => $teacher) { ?>
                                                                <option value="<?php echo $teacher->name ?>"><?php echo $teacher->name ?></option>
                                                              <?php } ?>

                                                            
                                                            
                                                        </select>
                                                    </div>
                                                
                                                
                                                    <div class="form-group" id="section-container">
                                                        <label for="subject_id">Select Subject</label>
                                                        <select require name="subject_id" id="subject_id" class="form-control">
                                                            <option value="">-Select Subject-</option>
                                                            <?php 
                                                        $args = array(
                                                        'type' => 'subject',
                                                        'status'=> 'publish',
                                                        'is_deleted' => '0'
                                                        );
                                                        $subjects = get_posts($args);
                                                        foreach ($subjects as $key => $subject) { ?>
                                                        <option value="<?php echo $subject->title ?>"><?php echo $subject->title ?></option>
                                                        <?php } ?>
                                                            <!-- <option value="22">Mathematics</option>
                                                            <option value="24">English</option> -->
                                                        </select>
                                                    </div>
                                                
                                               
                                                    <div class="form-group" id="section-container">
                                                        <label for="date">Select Date</label>
                                                        <input type="date" name="date" id="date">
                                                    </div>
                                               
                                                
                                                    <div class="form-group" id="section-container">
                                                        <label for="location">Select Location</label>
                                                        <select name="location" id="location">
                                                            <option>Lab-1</option>
                                                            <option>Lab-2</option>
                                                            <option>Lab-3</option>
                                                            <option>Lab-4</option>
                                                            <option>Lab-5</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group" id="section-container">
                                                        <label for="From">From</label>
                                                        <input type="time" name="from" id="from" class="form-control" placeholder="From">
                                                        
                                                    </div>
                                                    <div class="form-group" id="section-container">
                                                        <label for="to">To</label>
                                                        <input type="time" name="to" id="to" class="form-control" placeholder="to">
                                                    </div>
                                                
                                                
                                                    <div class="from-group">
                                                    <label for="">&nbsp;</label>
                                                    <input type="submit" value="submit" name="submit" class="btn btn-success form-control">
                                                    </div>
                                               
                        </div>
                    </form>
                </div>
            </div>
           <?php } else { ?>
        

    
        
            <div class="card ">
                <div class="card-header text-center"><h5>Exam Schedule</h5></div>
                <div class="card-body">
                <table class="table table-bordered text-center">
                    <thead>
                        <th>Sr.No</th>
                        <th>Class</th>
                        <th>Subject</th>
                        
                        <th>Teacher</th>
                        <th>Date</th>
                        <th>From/To</th>
                        <th>Location</th>
                    </thead>
                    <tbody>
<?php
$count = 1;
$query = mysqli_query($db_conn, "SELECT e.*, p.title AS class_title
                                FROM `exam` AS e
                                INNER JOIN `posts` AS p ON e.class = p.id");

while ($classs = mysqli_fetch_object($query)) {
    ?>
    <tr>
        <td><?= $count++ ?></td>
        <td><?= $classs->class_title ?></td> <!-- Display class title instead of ID -->
        <td><?= $classs->subject ?></td>
        <td><?= $classs->teacher ?></td>
        <td><?= $classs->date ?></td>
        <td><?= $classs->from ?> to <?= $classs->to ?></td>
        <td><?= $classs->location ?></td>
    </tr>
<?php } ?>
</tbody>
                </table>
                </div>
            </div>
       
    
    
   


<?php } ?>
</div><!--/. container-fluid -->
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

<?php include('footer.php') ?> 