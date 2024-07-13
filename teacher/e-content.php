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
              "INSERT INTO `econtent` (`class`, `unit`, `title`, `file`, `date`)
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
            <h2 class="m-0">E-content&nbsp;&nbsp;<a href="?action=add" class="btn btn-success btn-sm"> Add New </a>
            </h2>
            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="http://localhost/Virtue_of_Excellence/teacher/dashboard.php">Teacher</a></li>
              <li class="breadcrumb-item active">E-content</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<section class="content">
    <div class="container-fluid">
        
        
    
    
    
  
     </div><!--/. container-fluid -->

    
        <?php if (isset($_GET['action']) && $_GET['action'] == 'add') { ?>
            <div class="card">
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-6">
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
                            <div class="col-lg-6">
                                <div class="form-group" id="section-container">
                                <label for="unit">Unit</label><br>
                                <input class="form-control" placeholder="Unit" type="text" name="unit" id="unit">
                                
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group" id="section-container">
                                <label for="subject">Subject</label><br>
                                <select class="form-control" name="subject" id="subject">
                                    <option value="">Select Subject</option>
                                    <?php 
                                    $args = array(
                                      'type' => 'subject',
                                      'status'=> 'publish',
                                      'is_deleted' => '0'
                                    );
                                    $subjects = get_posts($args);
                                    foreach ($subjects as $key => $subject) { ?>
                                    <option value="<?php echo $subject->title?>"><?php echo $subject->title ?></option>
                                    <?php } ?>
                                </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group" id="section-container">
                                <label for="date">Date</label><br>
                                <input class="form-control" type="date" name="date" id="date">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group" id="section-container">
                                <label for="unit">Add Attachments</label><br>
                                <input type="file" name="fileToUpload" id="fileToUpload">
                                

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="from-group">
                                    <button class="btn btn-success" name="submit" id="submit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php } else { ?>

            
                
                    <div classclass="container-fluid">
                       <div class="card">
        <div class="card-body">
        
        <table class="text-center table table-bordered">
              <thead>
                <tr>
                  
                  <th><b>Subject</b></th>
                  <th><b>Unit</b></th>
                  <th><b>Date</b></th>
                  <th><b>E-content</b></th>
                </tr>
              </thead>
            
          <?php $query = mysqli_query($db_conn,"SELECT * FROM econtent "); 
          while($econtent = mysqli_fetch_object($query))
          {?>
            <tbody>
                <tr>
              
                  <td><?=$econtent->title?></td>
                  <td><?=$econtent->unit?></td>
                  <td><?=$econtent->date?></td>
                  <td><a href="<?=$econtent->file?>" download><i class="fas fa-book"></i></a></td>
                </tr>
              </tbody>
         <?php }
          ?>
          </table>
           </div>
        </div>
    </div>
                    </div>
                </section>
            <?php } ?>
        </div><!--/. container-fluid -->
    </section>
    <script>
        jQuery(document).ready(function() {

            jQuery('#class_id').change(function() {
                // alert(jQuery(this).val());

                jQuery.ajax({
                    url: 'ajax.php',
                    type: 'POST',
                    data: {
                        'class_id': jQuery(this).val()
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.count > 0) {
                            jQuery('#section-container').show();
                        } else {
                            jQuery('#section-container').hide();
                        }
                        jQuery('#section_id').html(response.options);
                    }
                });
            });

        })
    </script>

    <?php include('footer.php') ?>
