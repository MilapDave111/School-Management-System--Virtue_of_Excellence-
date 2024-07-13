<?php include('../includes/config.php') ?>
<?php
if(isset($_POST['submit']))
              {
                $rollno = isset($_POST['rollno'])?$_POST['rollno']:'';
                $pick = isset($_POST['pick'])?$_POST['pick']:'';
                $pick2 = isset($_POST['pick2'])?$_POST['pick2']:'';
                $pick3 = isset($_POST['pick3'])?$_POST['pick3']:'';
                $pick4 = isset($_POST['pick4'])?$_POST['pick4']:'';
                $drop = isset($_POST['drop'])?$_POST['drop']:'';
                $bus_number = isset($_POST['bus_num'])?$_POST['bus_num']:'';

                mysqli_query($db_conn,"INSERT INTO `transport_student` (`rollno`, `pick_up`, `pick_up2`, `pick_up3`, `pick_up4`,`drop_off`,`bus_num`)
                VALUES ('$rollno', '$pick','$pick2', '$pick3', '$pick4','$drop','$bus_number')") or die(mysqli_error($db_conn));
                
                header('Location: transportation.php');
                exit;
              }?>

<?php       
if(isset($_POST['submit_2']))
{
    $plate = isset($_POST['no_plate'])?$_POST['no_plate']:'';
    $type = isset($_POST['type'])?$_POST['type']:'';
    $Brand_name = isset($_POST['brand'])?$_POST['brand']:'';
    $capacity = isset($_POST['capacity'])?$_POST['capacity']:'';
    $Manufacture = isset($_POST['date_m '])?$_POST['date_m ']:'';
    $Policy_Number = isset($_POST['p_no'])?$_POST['p_no']:'';
    $expiration_date = isset($_POST['date_e'])?$_POST['date_e']:'';
    $coverage_details = isset($_POST['c_det'])?$_POST['c_det']:'';
    $gps = isset($_POST['gps'])?$_POST['gps']:'';
    $fuel = isset($_POST['f_type'])?$_POST['f_type']:'';
    $milage = isset($_POST['milage'])?$_POST['milage']:'';
    $bus = isset($_POST['bus'])?$_POST['bus']:'';
  
   mysqli_query($db_conn,"INSERT INTO `transport_bus` (`no_plate`,`bus_num`, `type`,`capacity`)
   VALUES ('$plate','$bus', '$type', '$capacity')") or die(mysqli_error($db_conn));
  
   header('Location: transportation.php');
   exit;
}
?>

<?php
if(isset($_POST['submit_3'])) {
  $name = isset($_POST['name']) ? $_POST['name'] : '';
  $exp = isset($_POST['exp']) ? $_POST['exp'] : '';
  $driving_records = isset($_POST['records']) ? $_POST['records'] : '';
  $criminal_records = isset($_POST['c_records']) ? $_POST['c_records'] : '';
  $allocated_bus = isset($_POST['bus_num'])? $_POST['bus_num'] : '';

  $certificate = '';
  $license = '';

  if(isset($_FILES['c_image']['name']) && !empty($_FILES['c_image']['name'])) {
      $certificate = uploadFile($_FILES['c_image'], '../dist/uploads/');
  }

  if(isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
      $license = uploadFile($_FILES['image'], '../dist/uploads/');
  }

  $query = "INSERT INTO `transport_driver` 
            (`name`, `experience`, `driving_records`, `criminal_records`, `certificate`, `license`, `bus_num`)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

  $stmt = mysqli_prepare($db_conn, $query);

  if($stmt) {
      mysqli_stmt_bind_param($stmt, "sssssss", $name, $exp, $driving_records, $criminal_records, $certificate, $license, $allocated_bus);

      if(mysqli_stmt_execute($stmt)) {
          header('Location: transportation.php');
          exit;
      } else {
          echo "Error: " . mysqli_stmt_error($stmt);
      }

      mysqli_stmt_close($stmt);
  } else {
      echo "Error: " . mysqli_error($db_conn);
  }
}

function uploadFile($file, $target_dir) {
  $target_file = $target_dir . basename($file['name']);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  // Check if file already exists
  if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
  }

  // Check file size
  if ($file["size"] > 5000000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
  }

  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
  }

  if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
      return '';
  } else {
      if (move_uploaded_file($file["tmp_name"], $target_file)) {
          return basename($file['name']);
      } else {
          echo "Sorry, there was an error uploading your file.";
          return '';
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
            <h1 class="m-0">Transportation
                <!-- <a href="?action=add_bus" class="btn btn-success btn-sm"> Add New Bus </a> -->
                <!-- <a href="?action=add_driver" class="btn btn-success btn-sm"> Add New Driver </a> -->
                <!-- <a href="?action=add_student" class="btn btn-success btn-sm"> Add New Student </a> -->

              </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="http://localhost/Virtue_of_Excellence/admin/dashboard.php">Admin</a></li>
              <li class="breadcrumb-item active">Transportation</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
   
  <section class="content">
    <div class="container-fluid">
    
    <div class="row">
             <div class="col-lg-3">
             <div class="row">
        <div class="col-lg-3"><br>
          <div class="card py-4" style="width:250px; height:90px;  background-color:#white">
             <div class="card-body" style="padding-top:0%; margin-top:0%;text-align:center;" >
                <i class="fas fa-bus fa-3x float-lg-left text-dark "></i>
                <a href="?action=add_bus" class="text-dark"><h5 class="py-2"><b>Add New Bus</b></h5></a>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-lg-3"><br>
                <div class="card py-4" style="width:250px; height:90px;  background-color:#white">
                    <div class="card-body" style="padding-top:0%; margin-top:0%;text-align:center;" >
                        <i class="fas fa-user-plus fa-3x float-lg-left text-dark "></i>
                        <a href="?action=add_driver"  class="text-dark"><h5><b>Add New Driver</b></h5></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3"><br>
                <div class="card py-4" style="width:250px; height:90px;  background-color:#white">
                    <div class="card-body" style="padding-top:0%; margin-top:0%;text-align:center;" >
                        <i class="fas fa-user-plus fa-3x float-lg-left text-dark "></i>
                        <a  href="?action=add_student"  class="text-dark"><h5><b>Add New Student</b></h5></a>
                    </div>
                </div>
            </div>
        </div>
             </div>
              




            <?php  if(isset($_GET['action']) && $_GET['action'] == 'add_bus') {
             ?>
             
              <div class="col-lg-8">
              <div class="card">
                <div class="row">
                
                <div class="card-body">
                  <form action="" method="post" enctype="multipart/form-data">

                    <div class="row">
                    <div class="col-lg-4">
                    <div class="form-group">
                      <label for="class">N0. Plate</label>
                      <input type="text" class="form-control" name="no_plate" id="no_plate" placeholder="Number Plate">
                    </div>
                    </div>
                    <div class="col-lg-4">
                    <div class="form-group" id="section-container">
                        <label for="teacher_id"> Bus_no</label>&nbsp;
                      <input class="form-control" type="text" name="bus" id="bus" >
                    </div>
                    </div>
                                        
                    <div class="col-lg-4">
                    <div class="form-group" id="section-container">
                      <label for="section">Type </label>
                     <select class="form-control" name="type" id="type">
                        <option value="Mini-Bus">Mini-Bus</option>
                        <option value="Full-Size-Bus">Full-Size-Bus</option>
                     </select>
                    </div>
                    </div>
                    </div>

                    <div class="row">
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="class">Brand Name</label>
                          <input type="text" class="form-control" name="brand" id="brand" placeholder="Brand Name">
                        </div>
                      </div>

                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="class">Capacity</label>
                          <input type="text" class="form-control" name="capacity" id="capacity" placeholder="Capacity">
                        </div>
                      </div>
                      <div class="col-lg-4">
                      <div class="form-group" id="section-container">
                        <label for="teacher_id"> Mileage</label>&nbsp;
                      <input class="form-control" type="text" name="milage" id="milage" >
                    </div>
                      </div>
                    </div>
                                       
                                              
                    

                    <div class="form-group" id="section-container">
                    <label for="teacher_id"> Insurance Detail</label>
                        <div class="row">
                           
                            <div class="col-lg">
                                <input class="form-control" name="p_no" type="text" placeholder="Policy Number">
                            </div> 
                            <div class="col-lg">
                                <input class="form-control" name="date_e" type="date" placeholder="expiry date">
                            </div>
                            <div class="col-lg">
                                <input class="form-control" name="c_det" type="text" placeholder="coverage details">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="class">GPS</label>
                          <select class="form-control" name="gps" id="gps">
                            <option value="">Yes</option>
                            <option value="">No</option>
                          </select>
                        </div>
                      </div>

                    <div class="col-lg-4">
                    <div class="form-group">
                      <label for="class">Fuel Type</label>
                     <select class="form-control" name="f_type" id="f_type">
                        <option value="">Petrol</option>
                        <option value="">Diesel</option>
                     </select>
                    </div>
                    </div>
                    <div class="col-lg-4">
                    <div class="form-group" id="section-container">
                        <label for="teacher_id"> Manufacture</label>&nbsp;
                      <input class="form-control" type="date" name="date_m" id="date_m" >
                    </div>
                    </div>
                    </div>

                    
                    
                    
                   <div class="from-group">
                      <label for="">&nbsp;</label>
                      <input type="submit" value="submit" name="submit_2" class="form-control btn btn-success">
                    </div>

                  
                </form>
              </div>
              </div>
              </div>
              </div>
             </div>
            
          <?php } 
           elseif(isset($_GET['action']) && $_GET['action'] == 'add_driver') {?>
            <div class="col-lg-8">
            <div class="card">
              <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">

                  <div class="form-group">
                    <label for="class">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Driver Name">
                  </div>

                  <div class="row">
                  <div class="col-lg-6">
                  <div class="form-group">
                    <label for="class">Experience</label>
                    <input type="text" class="form-control" name="exp" id="exp" placeholder="Experience">
                  </div>
                  </div>
                  
                  <div class="col-lg-6">
                  <div class="form-group">
                    <label for="class">Driving Records</label>
                    <input type="text" class="form-control" name="records" id="records" placeholder="Driving Records">
                  </div> 
                  </div>

                  </div> 
                  
                  <div class="row">
                    <div class="col-lg-3">
                    <div class="form-group">
                    <label for="class">Criminal Records</label><br>
                  <select name="c_records" id="c_records">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                  </select>
                  </div>  
                                
                 
                    </div>
                    <div class="col-lg-3"><div class="form-group">
                    <label for="">Add Certificates</label><br>
                  <input type="file" name="c_image" id="c_image">
                  </div> </div>
                    <div class="col-lg-3"><div class="form-group">
                    <label for="class">Driving License</label><br>
                  <input type="file" name="image" id="image">
                  </div>
                </div>
                  </div>

                  <div class="form-group" id="section-container">
                       <label for="section">Allocate Bus</label>
                        <select class="form-control" name="bus_num" id="bus_num">
                        <option value="">Select Bus Num</option>
                          <?php 
                          $query = mysqli_query($db_conn,"SELECT * FROM transport_bus");
                          while($bus = mysqli_fetch_object($query))
                          {?>
                            <option value="<?php echo $bus->bus_num ?>"><?=$bus->bus_num?></option>
                          <?php } ?>
                        </select>
                      </div>
                <div class="from-group">
                    <label for="">&nbsp;</label>
                    <input type="submit" value="submit" name="submit_3" class="form-control btn btn-success">
                  </div>
                  </form>
                </div>
              
            </div>
            </div>
          </div>
        <?php }
          
         elseif(isset($_GET['action']) && $_GET['action'] == 'add_student') { ?>
        <div class="col-lg-8">
        <div class="card">
          <div class="card-body">
              <form action="" method="post" >

              <div class="form-group">
                <label for="class">Student rollno</label>
                <input type="text" class="form-control" name="rollno" id="rollno" placeholder="Roll No">
              </div>

                                  
              <div class="form-group" id="section-container">
                <label for="">Pick-up Points </label>
              <select class="form-control" name="pick" id="pick">
                  <option value="Point 1">Point 1</option>
                  <option value="Point 2">Point 2</option>
                  <option value="Point 3">Point 3</option>
                  <option value="Point 4">Point 4</option>
              </select>
              </div>

              <div class="form-group" id="section-container">
                <label for="">Pick-up Points </label>
              <select class="form-control" name="pick1" id="pick1">
                  <option value="Point 1">Point 1</option>
                  <option value="Point 2">Point 2</option>
                  <option value="Point 3">Point 3</option>
                  <option value="Point 4">Point 4</option>
              </select>
              </div>

              <div class="form-group" id="section-container">
                <label for="">Pick-up Points </label>
              <select class="form-control" name="pick2" id="pick2">
                  <option value="Point 1">Point 1</option>
                  <option value="Point 2">Point 2</option>
                  <option value="Point 3">Point 3</option>
                  <option value="Point 4">Point 4</option>
              </select>
              </div>

              <div class="form-group" id="section-container">
                <label for="">Pick-up Points </label>
              <select class="form-control" name="pick3" id="pick3">
                  <option value="Point 1">Point 1</option>
                  <option value="Point 2">Point 2</option>
                  <option value="Point 3">Point 3</option>
                  <option value="Point 4">Point 4</option>
              </select>
              </div>

              <div class="form-group" id="section-container">
                <label for="">Pick-up Points </label>
              <select class="form-control" name="pick4" id="pick4">
                  <option value="Point 1">Point 1</option>
                  <option value="Point 2">Point 2</option>
                  <option value="Point 3">Point 3</option>
                  <option value="Point 4">Point 4</option>
              </select>
              </div>

              <div class="form-group" id="section-container">
                <label for="">Drop-off Points </label>
              <select class="form-control" name="drop" id="drop">
                  <option value="Point 1">Point 1</option>
                  <option value="Point 2">Point 2</option>
                  <option value="Point 3">Point 3</option>
                  <option value="Point 4">Point 4</option>
              </select>
              </div>

              <div class="form-group" id="section-container">
                       <label for="section">Bus</label>
                        <select class="form-control" name="bus_num" id="bus_num">
                        <option value="">Select Bus Num</option>
                          <?php 
                          $query = mysqli_query($db_conn,"SELECT * FROM transport_bus");
                          while($bus = mysqli_fetch_object($query))
                          {?>
                            <option value="<?php echo $bus->bus_num ?>"><?=$bus->bus_num?></option>
                          <?php } ?>
                        </select>
                      </div>
              
              <div class="from-group">
                <label for="">&nbsp;</label>
                <input type="submit" value="submit" name="submit" class="form-control">
              </div>

              </div>
              </form>
        </div>
        </div>
          


      
      
        <?php } else {?>
          <div class="col-lg-8">
      <div class="row">
        <?php
    $count = 0;
    $query = mysqli_query($db_conn, "SELECT * FROM `transport_bus`");
    
    while ($bus = mysqli_fetch_object($query)) {
        ?>
        
        <div class="col-lg-2">
        <div class="card" style="height:38px; width:85.5px">
            <form action="" method="get">
                <button name="bus_num" value="<?= $bus->bus_num ?>" class="btn  text-dark" style="background-color:white;width:85.5px">
                    Bus No:<?= $bus->bus_num ?>
                </button>
            </form>
        </div>
        </div>
        <?php
    }?>
    
   <?php if (isset($_GET['bus_num'])) {
        $busNum = $_GET['bus_num'];
        $query = mysqli_query($db_conn, "SELECT ts.rollno, ts.bus_num, ts.pick_up, ts.drop_off, td.name, tb.no_plate 
            FROM transport_student ts
            JOIN transport_driver td ON ts.bus_num = td.bus_num
            JOIN transport_bus tb ON ts.bus_num = tb.bus_num
            WHERE ts.bus_num = '$busNum'");
        
        ?>
        <div class="row">
    <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <table cellpadding="20" class="table-bordered">
                          <tr>
                            <th colspan=6 class="text-center">Bus No:<?php echo $busNum?></th>
                          </tr>
                            <tr>
                                <th>SrNo</th>
                                <th>rollno</th>
                                <th>Pick-up</th>
                                <th>Drop-off</th>
                                <th>Driver Name</th>
                                <th>Number plate</th>
                            </tr>
        
            
                            <?php
                            while ($queryy = mysqli_fetch_object($query)) {
                                ?>
                                <tr>
                                    <td><?= ++$count ?></td>
                                    <td><?= $queryy->rollno ?></td>
                                    <td><?= $queryy->pick_up ?></td>
                                    <td><?= $queryy->drop_off ?></td>
                                    <td><?= $queryy->name ?></td>
                                    <td><?= $queryy->no_plate ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
          </div>
        </div>
        
        
    
      <?php
    }
}
?>
    </div>
         
          
         </div>   
  </section>


<?php include('footer.php') ?>