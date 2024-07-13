<?php include('../includes/config.php') ?>

<?php
    if(isset($_POST['submit']))
    {
      $from = isset($_POST['from'])?$_POST['from']:'';
      $to = isset($_POST['to'])?$_POST['to']:'';
      $type = isset($_POST['type'])?$_POST['type']:'';
      $description = isset($_POST['description'])?$_POST['description']:'';

      $query = mysqli_query($db_conn,"INSERT INTO `leave` (`from`,`to`,`leave_type`,`description`) VALUES('$from','$to','$type','$description') ");

     if($query)
     {
       $item_id = mysqli_insert_id($db_conn);
     }

     header('Location:leave.php');
    }
?>

<?php include('header.php') ?>
<?php include('sidebar.php') ?>
   
   
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Leave Application</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="http://localhost/Virtue_of_Excellence/teacher/dashboard.php">Teacher</a></li>
              <li class="breadcrumb-item active">Leave</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                
      
        
        <div class="card">
            <div class="card-header py-2">
                <h3 class="card-title">
                Application
                </h3>
                <div class="card-tools">
                    
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered" >
                  <thead>
                    <tr>
                    <th>S.No</th>
                    <th>From</th>
                    <th>To</th>
                    <th>type</th>
                    <th>description</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $count =1;
                    $query = mysqli_query($db_conn,"SELECT * FROM `leave`");
                    
                    while($queryy = mysqli_fetch_object($query))
                    {?>
                        <tr>
                        <td><?=$count++?></td>
                        <td><?=$queryy->from?></td>
                        <td><?=$queryy->to?></td>
                        <td><?=$queryy->leave_type?></td>
                        <td><?=$queryy->description?></td>
                        </tr>
                    <?php }
                    ?>
                  </tbody>
                  </table>
            </div>
        </div>
                </div>
                <div class="col-lg-4">
                <div class="card">
          
          <div class="card-body">
              <form action="" method="POST">
              
                <div class="form-group">
                <label for="from">From</label>  
                <input required type="date" placeholder="Time" class="form-control" name="from" >
                </div>
                <div class="form-group">
                <label for="to">To</label>  
                <input required type="date" placeholder="Time" class="form-control" name="to" >
                </div>
                <div class="form-group">
                <label for="to">Type</label>  
                <select class="form-control" name="type" id="type" require>
                <option value="">-Select Leave Type-</option>
                                    <option value="Sick Leave (Personal)">-Sick Leave (Personal)-</option>
                                    <option value="Sick Leave (Family">-Sick Leave (Family)-</option>
                                    <option value="Emergency Leave">-Emergency Leave-</option>
                                    <option value="Annual Leave">-Annual Leave-</option>
                                    <option value="CL (Casual Leave)">-CL (Casual Leave)</option>
                                    <option value="SCL (Special Casual Leave">SCL (Special Casual Leave) </option>
                                    <option value="Study Leave">Study Leave</option>
                                    <option value="Maternity Leave">Maternity Leave</option>
                                    <option value="Paternity Leave">Paternity Leave</option>
                </select>
                </div>

               

                <div class="form-group">
                <label for="to">Description</label>  
                <textarea class="form-control" name="description" id="description" cols="30" rows="3" placeholder="Description" require></textarea>
                </div>
                
                

                <button name="submit" value="submit"class="btn btn-success float-right">Submit</button>
              </form>
          </div>
      </div>
                </div>
            </div>
        
          
        </div>
    </section>


    
<?php include('footer.php') ?>