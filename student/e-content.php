<?php include('../includes/config.php') ?>
<?php 
if (isset($_POST['submit'])) {
  $class = isset($_POST['class']) ? $_POST['class'] : '';
  $unit = isset($_POST['unit']) ? $_POST['unit'] : '';
  $name = isset($_POST['subject']) ? $_POST['subject'] : '';
  $date = isset($_POST['date']) ? $_POST['date'] : date('Y-m-d g:i:s');
  $image = $_FILES["fileToUpload"]["name"];

  $target_dir = "../dist/uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  // Check if image file is a actual image or fake image
  if (isset($_POST["submit"])) {
      
  }

  // Check if file already exists
  if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
  }

  // Check file size
  if ($_FILES["fileToUpload"]["size"] > 5000000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
  }

  

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
  } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
          mysqli_query(
              $db_conn,
              "INSERT INTO `econtent` (`class`, `unit`, `name`, `file`, `date`)
              VALUES ('$class', '$unit', '$name', '$image', '$date')"
          ) or die(mysqli_error($db_conn));
         echo "Successfully File Uploaded";
          header('Location: e-content.php');
          exit;
      } else {
          echo "Sorry, there was an error uploading your file.";
      }
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
            <h2 class="m-0">E-content
            </h2>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="http://localhost/Virtue_of_Excellence/student/dashboard.php">Student</a></li>
              <li class="breadcrumb-item active">E-content</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<section class="content">
    <div class="container-fluid">
        
        
    
    <div class="card">
        <div class="card-body">
        
        <table class="table table-boardered text-center" width="100%">
              <thead>
                <tr>
                  
                  <th>Subject</th>
                  <th>Unit</th>
                  <th>Date</th>
                  <th>E-content</th>
                </tr>
              </thead>
            
          <?php  $q = mysqli_query($db_conn, "SELECT * 
                                        FROM econtent AS e
                                        INNER JOIN accounts AS a ON a.class = e.class
                                        WHERE a.id = '$std_id' AND a.type = 'student'");
           
           // Output the SQL query for debugging
           // echo "SQL Query: " . "SELECT p.* FROM posts AS p INNER JOIN accounts AS a ON a.class = p.Class_onlyforsubject WHERE a.id = '$std_id' AND p.type = 'subject'";
           
           $count = 1; // Initialize the counter outside the loop
           
           // Output the number of rows returned for debugging
           // echo "Number of Rows: " . mysqli_num_rows($q);
           
           while ($e = mysqli_fetch_object($q)) {
               ?>
                <tr>
               
                  <td><?=$e->title?></td>
                  <td><?=$e->unit?></td>
                  <td><?=$e->date?></td>
                  <td><a href="<?=$e->file?>" download><i class="fas fa-book"></i></a></td>
                </tr>
               <?php
           }
           ?>
          
         
          
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