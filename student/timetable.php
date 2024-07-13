<?php include('../includes/config.php') ?>
<?php include('header.php') ?>
<?php include('sidebar.php') ?>


     <!-- Content Header (Page header) -->
     <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Time Table
            
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="http://localhost/Virtue_of_Excellence/student/dashboard.php">Student</a></li>
              <li class="breadcrumb-item active">Time Table</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
   
    <section class="content">
    <div class="container-fluid">
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
                        $args = array(
                            'type' => 'period',
                            'status' => 'publish',
                            'is_deleted' => '0'
                        );
                        $periods = get_posts($args);
                        $user_data = get_user_data($std_id);
                        $class= mysqli_query($db_conn,"SELECT m.class FROM manage_students_sections AS m INNER JOIN accounts AS a ON a.rollno = m.rollno WHERE a.id = $std_id");
                        $section= mysqli_query($db_conn,"SELECT m.section FROM manage_students_sections AS m INNER JOIN accounts AS a ON a.rollno = m.rollno WHERE a.id = $std_id");

                        $class_row = mysqli_fetch_assoc($class);
$section_row = mysqli_fetch_assoc($section);

$class_value = $class_row['class'];
$section_value = $section_row['section'];

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
                            AND md.item_id IN (SELECT item_id FROM meta_data WHERE meta_key = 'class_id' AND meta_value = '$class_value' AND item_id IN 
                            (SELECT item_id FROM meta_data WHERE meta_key = 'section_id' AND meta_value ='$section_value' ))");
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