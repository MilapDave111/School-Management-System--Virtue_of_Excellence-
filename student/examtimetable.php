<?php include('../includes/config.php') ?>
<?php include('header.php') ?>
<?php include('sidebar.php') ?>


     <!-- Content Header (Page header) -->
     <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Exam Time Table
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="http://localhost/Virtue_of_Excellence/student/dashboard.php">Student</a></li>
              <li class="breadcrumb-item active">Exam Time Table</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
   
    <section class="content">
    <div class="container-fluid">
        
        

    
        
            <div class="card mx-1">
                <p class="text-center">Exam Schedule</p>
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
                            // $query = mysqli_query($db_conn,"SELECT * FROM `exam`");
                            $query = mysqli_query($db_conn,"SELECT e.*, p.title AS class_title
                                FROM exam AS e
                                INNER JOIN accounts AS a ON a.class = e.class
                                INNER JOIN posts AS p ON e.class = p.id
                                WHERE a.id = '$std_id'");

                            while($classs = mysqli_fetch_object($query))
                            {?>
                                <tr>
                                    <td><?=$count++?></td>
                                <td><?=$classs->class_title?></td>
                                <td><?=$classs->subject?></td>
                               
                                <td><?=$classs->teacher?></td>
                                <td><?=$classs->date?></td>
                                <td><?=$classs->from?> to <?=$classs->to?></td>
                                <td><?=$classs->location?></td>
                                </tr>
                       <?php }?>
                    </tbody>
                </table>
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