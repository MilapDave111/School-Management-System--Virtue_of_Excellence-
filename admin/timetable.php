<?php include('../includes/config.php') ?>
<?php include('header.php') ?>
<?php include('sidebar.php') ?>


     <!-- Content Header (Page header) -->
     <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0" style="color:#03285e">Time Table
                
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
        <div class="card">
            <div class="card-body">
            <form action="" method="post">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="form-group">
                        <label for="class">Select Class</label>
                                <select name="class" id="class" class="form-control">
                                    <option value="">-Select Class-</option>
                                    <?php 
                                    $args = array(
                                      'type' => 'class',
                                      'status'=> 'publish',
                                      'is_deleted' => '0'
                                    );
                                    $classes = get_posts($args);
                                    foreach ($classes as $key => $class) { ?>
                                    <option value="<?php echo $class->id?>"><?php echo $class->title ?></option>
                                    <?php } ?>
                                </select> 
                        </div>
                    </div>
                    <div class="col-lg-5">
                    <div class="form-group" id="section-container">
                                 <label for="section">Select Section</label>
                                <select name="section" id="section" class="form-control">
                                    <option value="">-Select Section-</option>
                                </select>
                            </div>

                    </div>
                  
                    <div class="col-lg">
                      
                    <div class="form-group " id="section-container">
                    <label>&nbsp;</label>
                        <button type="submit" name="submit_2" class="form-control">Submit</button>        
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
                 if(isset($_POST['submit_2']))
                 {
                     $class = isset($_POST['class'])?$_POST['class']:'';
                     $section = isset($_POST['section'])?$_POST['section']:'';
                    
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
                            AND md.item_id IN (SELECT item_id FROM meta_data WHERE meta_key = 'class_id' AND meta_value = '$class' AND item_id IN 
                            (SELECT item_id FROM meta_data WHERE meta_key = 'section_id' AND meta_value = '$section'))");
                             
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
   <?php }  ?>
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