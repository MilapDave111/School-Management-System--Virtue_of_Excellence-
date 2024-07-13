<?php include('../includes/config.php') ?>

<?php
if(isset($_POST['submit']))
{
    $class_id = isset($_POST['class'])?$_POST['class']:'';
    $section_id = isset($_POST['section'])?$_POST['section']:'';
    $teacher_id = isset($_POST['teacher_id'])?$_POST['teacher_id']:'';
    $period_id = isset($_POST['period_id'])?$_POST['period_id']:'';
    $day_name = isset($_POST['day_name'])?$_POST['day_name']:'';
    $subject_id = isset($_POST['subject_id'])?$_POST['subject_id']:'';
    $date_add = date('Y-m-d g:i:s');
    $status = 'publish';
    $author = 1;
    $type = 'timetable';

    $query = mysqli_query($db_conn, "INSERT INTO posts (`type`,`author`,`status`,`publish_date`) VALUES ('$type','$author','$status','$date_add')");
    if($query)
    {
        $item_id = mysqli_insert_id($db_conn);
    }
    $meta_data = array(
        'class_id' => $class_id,
        'section_id' => $section_id,
        'teacher_id' => $teacher_id,
        'period_id' => $period_id,
        'day_name' => $day_name,
        'subject_id' => $subject_id,
    );
    
    foreach ($meta_data as $key => $value) {
        mysqli_query($db_conn, "INSERT INTO meta_data (`item_id`,`meta_key`,`meta_value`) VALUES ('$item_id','$key','$value')");
    }

    header('Location: teacher_timetable.php');
}
?>

<?php include('header.php') ?>
<?php include('sidebar.php') ?>


     <!-- Content Header (Page header) -->
     <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0" style="color:#03285e">Manage Time Table
                <a href="?action=add" class="btn btn-success btn-sm"> Add New </a>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="http://localhost/Virtue_of_Excellence/admin/dashboard.php">Admin</a></li>
              <li class="breadcrumb-item active">Time Table</li>
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
                        <div class="row">
                            <div class="col-lg">
                                <div class="form-group">
                                    <label for="class_id">Select Class</label>
                                    <select require name="class" id="class" class="form-control">
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
                            </div>
                            <div class="col-lg">
                                <div class="form-group" id="section-container">
                                    <label for="section_id">Select Section</label>
                                    <select require name="section" id="section" class="form-control">
                                        <option value="">-Select Section-</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="form-group" id="section-container">
                                    <label for="teacher_id">Select Teacher</label>
                                    <select require name="teacher_id" id="teacher_id" class="form-control">
                                        <option value="">-Select Teacher-</option>
                                       <?php 
                                       $query = mysqli_query($db_conn,"SELECT * FROM accounts WHERE `type` = 'teacher' AND `is_deleted` = '0'");
                                       while($queryy = mysqli_fetch_object($query))
                                       {?>
                                            <option value="<?=$queryy->id?>"><?=$queryy->name?></option>
                                       <?php }
                                       ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="form-group" id="section-container">
                                    <label for="period_id">Select Period</label>
                                    <select require name="period_id" id="period_id" class="form-control">
                                        <option value="">-Select Period-</option>
                                        <?php
                                        $args = array(
                                            'type' => 'period',
                                            'status' => 'publish',
                                            'is_deleted' => '0'
                                        );
                                        $periods = get_posts($args); 
                                        foreach ($periods as $key => $period) { ?>
                                        <option value="<?php echo $period->id ?>"><?php echo $period->title ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="form-group" id="section-container">
                                    <label for="day_name">Select Day</label>
                                    <select require name="day_name" id="day_name" class="form-control">
                                        <option value="">-Select Day-</option>

                                        <?php
                                        $days = ['monday','tuesday','wednesday','thursday','friday','saturday'];
                                        foreach ($days as $key => $day) { ?>
                                            <option value="<?php echo $day ?>"><?php echo ucwords($day)?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="form-group" id="section-container">
                                    <label for="subject_id">Select Subject</label>
                                    <select require name="subject_id" id="subject_id" class="form-control">
                                        <option value="">-Select Subject-</option>
                                        <?php
                                        $args = array(
                                            'type' => 'subject',
                                            'status' => 'publish',
                                            'is_deleted' => '0'
                                        );
                                        $subjects = get_posts($args); 
                                        foreach ($subjects as $key => $subject) { ?>
                                        <option value="<?php echo $subject->id ?>"><?php echo $subject->title ?></option>
                                        <?php } ?>
                                        <!-- <option value="22">Mathematics</option>
                                        <option value="24">English</option> -->
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="from-group">
                                <label for="">&nbsp;</label>
                                <input type="submit" value="submit" name="submit" class="btn btn-success form-control">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
           <?php } else { ?>
        <div class="card">
            <div class="card-body">
            <form action="" method="post">
                <div class="row">
                <div class="col-lg">
                                <div class="form-group" id="section-container">
                                    <label for="teacher_id">Select Teacher</label>
                                    <select require name="teacher_id" id="teacher_id" class="form-control">
                                        <option value="">-Select Teacher-</option>
                                       <?php 
                                       $query = mysqli_query($db_conn,"SELECT * FROM accounts WHERE `type` = 'teacher' AND `is_deleted` = '0'");
                                       while($queryy = mysqli_fetch_object($query))
                                       {?>
                                            <option value="<?=$queryy->id?>"><?=$queryy->name?></option>
                                       <?php }
                                       ?>
                                    </select>
                                </div>
                            </div>
                            <!-- <button class="btn btn-success">Submit</button> -->
                    

                    <div class="col-lg">
                    <div class="form-group" >
                    <label for="">&nbsp;</label>
                                <button class="btn btn-success form-control btn-sm" name="submit_2" id="submit_2" value="submit_2" >Submit</button>
                            </div>
                           
                    </div>
                    
                </div>
            </form>
        </div>
    </div>
    
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Time Table</th>
                        <th>Monday</th>
                        <th>Tuesday</th>
                        <th>Wednesday</th>
                        <th>Thursday</th>
                        <th>Friday</th>
                        <th>Saturday</th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php
                if(isset($_POST['submit_2'])){
                $class = isset($_POST['class'])?$_POST['class']:'';
                $section = isset($_POST['section'])?$_POST['section']:'';
                $teacher_id = isset($_POST['teacher_id'])?$_POST['teacher_id']:'';

                        $args = array(
                            'type' => 'period',
                            'status' => 'publish',
                            'is_deleted' => '0'
                        );
                        $periods = get_posts($args);

                        foreach($periods as $period) {
                            $from = get_meta_data($period->id, 'from')[0]->meta_value;

                            $to = get_meta_data($period->id, 'to')[0]->meta_value;
                            ?>                    
                        <tr>
                        <td><?php echo date('h:i A',strtotime($from)) ?> - <?php echo date('h:i A ', strtotime($to)) ?></td>
                        
                        <?php 
                        $days = ['monday', 'tuesday', 'wednesday','thursday', 'friday','saturday'];
                        foreach($days as $day) { 
                            $query = mysqli_query($db_conn, "SELECT * FROM posts AS p 
                            INNER JOIN meta_data AS md ON (md.item_id = p.id) 
                            INNER JOIN meta_data AS mp ON (mp.item_id = p.id) 
                            WHERE p.type = 'timetable' AND p.status = 'publish' 
                            AND md.meta_key = 'day_name' AND md.meta_value = '$day' 
                            AND mp.meta_key = 'period_id' AND mp.meta_value = $period->id
                            AND md.item_id IN (SELECT item_id FROM meta_data WHERE meta_key = 'teacher_id' AND meta_value = '$teacher_id')");

                            if(mysqli_num_rows($query)>0){
                                while($timetable = mysqli_fetch_object($query)) {
                                 ?>
                                    
                                <td>
                                   
                                    <p><b>Teacher:</b>
                                    <?php 
                                    $teacher_id = get_meta_data($timetable->item_id,'teacher_id',)[0]->meta_value;
                                    echo get_user_data($teacher_id)[0]->name;
                                    ?><br>

                                    <b>Class:</b>
                                    <?php 
                                    $class_id = get_meta_data($timetable->item_id,'class_id',)[0]->meta_value;
                                    echo get_post(array('id' => $class_id))->title;
                                    ?><br>

                                    <b>Section: </b>
                                    <?php 
                                    $section_id = get_meta_data($timetable->item_id,'section_id',)[0]->meta_value;
                                    echo get_post(array('id'=>$section_id))->title;
                                    ?>
                                    <br>

                                    <b>Subject:</b> <?php 
                                    $subject_id = get_meta_data($timetable->item_id,'subject_id')[0]->meta_value;
                                    echo get_post(array('id' => $subject_id))->title;
                                    ?>
                                     <br>
                                     <form method="post" action="">
                                        <input type="hidden" name="user_id" value="<?= $timetable->item_id ?>">
                                        <button type="submit" name="delete" class="btn btn-danger btn-sm mx-1 px-3">Delete</button>
                                    </form>
                                </p>
                                </td>
                            <?php } } else { ?>
                                    <td>Unscheduled</td>
                        
                        <?php } } ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
   <?php } } ?>
</div><!--/. container-fluid -->
</section>
<?php
if (isset($_POST['delete'])) {
    $user_id = $_POST['user_id'];

    // Instead of marking as deleted, directly delete the row
    $delete_query = "DELETE FROM posts WHERE id = $user_id";
    mysqli_query($db_conn, $delete_query);
}
?>

            
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