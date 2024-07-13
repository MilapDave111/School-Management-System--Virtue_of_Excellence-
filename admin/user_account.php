<?php include('../includes/config.php') ?>
<?php
$error = '';
$rollno_1 = '92100938000';
if(isset($_POST['submit']))
{
  $query = mysqli_query($db_conn,"SELECT * FROM accounts WHERE type = 'student'
           ORDER BY id DESC LIMIT 1");
           $student = mysqli_fetch_object($query);
           $enrol = $student->rollno + 1;
           

  $name     = $_POST['name'];
  $email    = $_POST['email'];
  $password = md5(1234567890);
  $type     = $_POST['type'];
  $rollno_1 = $enrol;

  $name = isset($_POST['name'])?$_POST['name']:'';
  $dob = isset($_POST['dob'])?$_POST['dob']:'';
  $mobile = isset($_POST['mobile'])?$_POST['mobile']:'';
  $email = isset($_POST['email'])?$_POST['email']:'';
  $gender = isset($_POST['gender '])?$_POST['gender ']:'';
  $address = isset($_POST['address'])?$_POST['address']:'';
  $country = isset($_POST['country'])?$_POST['country']:'';
  $state = isset($_POST['state'])?$_POST['state']:'';
  $zip = isset($_POST['zip'])?$_POST['zip']:'';
  
  $password = $mobile;
  $md_password = md5($password);

  $father_name = isset($_POST['father_name'])?$_POST['father_name']:'';
  $father_mobile = isset($_POST['father_mobile'])?$_POST['father_mobile']:'';
  $mother_name = isset($_POST['mother_name'])?$_POST['mother_name']:'';
  $mother_mobile = isset($_POST['mother_mobile'])?$_POST['mother_mobile']:'';
  $parent_address = isset($_POST['parent_address'])?$_POST['parent_address']:'';
  $parent_country = isset($_POST['parent_country'])?$_POST['parent_country']:'';
  $parent_state = isset($_POST['parent_state'])?$_POST['parent_state']:'';
  $parent_zip = isset($_POST['parent_zip'])?$_POST['parent_zip']:'';
 
  $rollno = isset($_POST['rollno'])?$_POST['rollno']:'';
  $school_name = isset($_POST['school_name'])?$_POST['school_name']:'';
  $previous_class = isset($_POST['previous_class'])?$_POST['previous_class']:'';
  $status = isset($_POST['status'])?$_POST['status']:'';
  $total_marks = isset($_POST['total_marks'])?$_POST['total_marks']:'';
  $obtain_mark = isset($_POST['obtain_mark'])?$_POST['obtain_mark']:'';
  $previous_percentage = isset($_POST['previous_percentage'])?$_POST['previous_percentage']:'';

  $class = isset($_POST['class'])?$_POST['class']:'';
  $section = isset($_POST['section'])?$_POST['section']:'';
  $subject_streem = isset($_POST['subject_streem'])?$_POST['subject_streem']:'';
  $doa = isset($_POST['doa'])?$_POST['doa']:'';
  $type = isset($_POST['type'])?$_POST['type']:'';
  $date_add = date('Y-m-d');

  $degree_name = isset($_POST['degree_name'])?$_POST['degree_name']:'';
  $Expertisised_subjects = isset($_POST['Expertisised_subjects'])?$_POST['Expertisised_subjects']:'';
  $Teaching_Experiance = isset($_POST['Teaching_Experiance'])?$_POST['Teaching_Experiance']:'';
  $Criminal_Background = isset($_POST['Criminal_Background'])?$_POST['Criminal_Background']:'';
  $image = isset($_FILES["thumbnail"]["name"]) ? $_FILES["thumbnail"]["name"] : '';


  $payment_method = isset($_POST['payment_method'])?$_POST['payment_method']:'';
  

  $check_query = mysqli_query($db_conn, "SELECT * FROM accounts WHERE email = '$email'");
  if(mysqli_num_rows($check_query) > 0)
  {
    $error = 'Email already exists';
  }
  

  $target_dir = "../dist/uploads/";
  $target_file = $target_dir . basename($_FILES["thumbnail"]["name"]);
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  $uploadOk = 1;

  // Check if file already exists
  

  // Check file size
 
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
      if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file)) {
        mysqli_query($db_conn, "INSERT INTO accounts (`name`,`email`,`password`,`type`,`rollno`,`class`,`image`) VALUES ('$name','$email','$md_password','$type','$rollno_1','$class','$image')") or die(mysqli_error($db_conn));
        $_SESSION['success_msg'] = 'User has been succefuly registered';
        
        $othermeta_query = mysqli_query($db_conn, "INSERT INTO othermeta (`name`, dob, mobile, email, `address`, country, `state`, zip, father_name, father_mobile, mother_name,class, doa, `type`, date_add, payment_method)
        VALUES ('$name', '$dob', '$mobile', '$email', '$address', '$country', '$state', '$zip', '$father_name', '$father_mobile', '$mother_name', '$class','$doa', '$type', '$date_add', '$payment_method');
        ") or die(mysqli_error($db_conn));
    
        mysqli_query($db_conn, "INSERT INTO result (`acc_id`,`rollno`,`q1a`,`q1b`,`q2a`,`q2b`,`q3a`,`q3b`,`q4a`,`q4b`,`q5a`,`q5b`,`q6a`,`q6b`,`total`,`subject`,`count`,`percentage`)
        VALUES ('0', '$rollno_1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0')");
            
          
      
        header('location: user_account.php?user='.$type);
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
            <div class="d-flex">
              <h1 class="m-0 text-dark">Manage Accounts</h1>
              &nbsp;&nbsp;<a href="user_account.php?user=<?php echo $_REQUEST['user']?>&action=add-new" class="btn btn-primary btn-sm text-center">Add New</a>
            </div>

          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="http://localhost/Virtue_of_Excellence/admin/dashboard.php">Accounts</a></li>
              <li class="breadcrumb-item active"><?php echo ucfirst($_REQUEST['user'])?></li>
            </ol>
          </div><!-- /.col --> 
          <?php
          // $_SESSION['success_msg'] = 'User has been succefuly registered';
            // print_r($_SESSION);
            if(isset($_SESSION['success_msg']))
            {?>
              <div class="col-12">
                <small class="text-success" style="font-size:16px"><?=$_SESSION['success_msg']?></small>
              </div>
            <?php 
              unset($_SESSION['success_msg']);
            }
          ?>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <?php if(isset($_GET['action'])) { ?>
          <div class="card">
            <div class="card-body" id="form-container">
              <?php if($_GET['action'] == 'add-new'){ ?>
              <form action="" id="" method="post" enctype="multipart/form-data">
                <fieldset class="border border-secondary p-3 form-group">
                  <legend class="d-inline w-auto h6"><? echo ucfirst($_REQUEST['user'])?></legend>
                    <div class="row">
                      
                    <div class="col-lg-12">
                        <div class="form-group">
                          <label for="">Full Name</label>
                          <input type="text" class="form-control" placeholder="Full Name" name="name">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="">DOB</label>
                          <input type="date" required class="form-control" placeholder="DOB" name="dob">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="">Mobile</label>
                          <input required type="tel" minlength="10" maxlength="10" class="form-control" placeholder="Mobile" name="mobile">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="">Email</label>
                          <input type="email" required class="form-control" placeholder="Email Address" name="email">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                        <div class="row">
                          <div class="col-lg-3">GENDER</div>
                          <div class="col-lg-6">
                              <div class="row">
                              <label for="">Male</label>
                                  <div class="col-lg">
                                    <input type="radio" name="gender" id="male" value="male">
                                  </div>
                                  <label for="">Female</label>
                                  <div class="col-lg">
                                    <input type="radio" name="gender" id="female" value="female">
                                  </div>
                              </div>
                          
                          </div>
                        </div>
                        </div>
                      
                        
                        
                    </div>

                      <!-- Address Fields -->
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label for="">Address</label>
                          <input required type="text" class="form-control" placeholder="Address" name="address">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="">Country</label>
                          <input type="text" class="form-control" placeholder="Country" name="country">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="">State</label>
                          <input type="text" class="form-control" placeholder="State" name="state">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="">Pin/Zip Code</label>
                          <input type="text" maxlength="6" minlength="6" class="form-control" placeholder="Pin/Zip Code" name="zip">
                        </div>
                      </div>
                    </div>
                </fieldset>

                <fieldset class="border border-secondary p-3 form-group">
                  <legend class="d-inline w-auto h6">Parents Information</legend>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="">Father's Name</label>
                          <input required type="text" class="form-control" placeholder="Father's Name" name="father_name">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="">Father's Mobile</label>
                          <input  type="tel" maxlength="6" minlength="10" class="form-control" placeholder="Father's Mobile" name="father_mobile">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="">Mother's Name</label>
                          <input required maxlength="10" minlength="10" type="text" class="form-control" placeholder="Mother's Name" name="mother_name">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="">Mothers's Mobile</label>
                          <input type="text" maxlength="10" minlength="10" class="form-control" placeholder="Mothers's Mobile" name="mother_mobile">
                        </div>
                      </div>
                      <!-- Address Fields -->
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label for="">Address</label>
                          <input type="text" class="form-control" placeholder="Address" name="parents_address">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="">Country</label>
                          <input type="text" class="form-control" placeholder="Country" name="parents_country">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="">State</label>
                          <input type="text" class="form-control" placeholder="State" name="parents_state">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="">Pin/Zip Code</label>
                          <input type="text" minlength="6" class="form-control" placeholder="Pin/Zip Code" name="parents_zip">
                        </div>
                      </div>
                    </div>
                </fieldset>
                

                


                 <?php  
                if($_REQUEST['user'] == 'teacher' || $_REQUEST['user'] == 'higherauthority' )
                {?>
                <fieldset class="border border-secondary p-3 form-group">
                  <legend class="d-inline w-auto h6">Educational Background</legend>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                        <label for="">Degree Name</label>
                          <input type="text" class="form-control" placeholder="Degree Name" name="degree_Name">
                        </div>
                      </div>
                      <div class="col-lg-6 form-group">
                      <label for="">Expertisised subjects</label> <br>
                        <input type="text" class="form-control" placeholder="Degree Name" name="expertisised_subjects ">
                        </div>
                        </div>

                        <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                        <label for="">Teaching Experiance</label>
                          <input type="text" class="form-control" placeholder="no. of Years" name="teaching_experiance">
                        </div>
                      </div>
                      <div class="col-lg-6 form-group">
                      <label for="">Criminal Background</label> <br>
                        <input type="text" class="form-control" placeholder="Yes/NO" name="criminal_background">
                        </div>
                        </div>
                     
                    <div class="row">
                      <div class="col-lg-6">
                      <label for="">RESUME</label> <br>
                        <input type="file" class="" placeholder="" name="resume">
                      </div>
                     
                      <?php if($_REQUEST['user'] == 'higherauthority'){?>
                      <div class="col-lg-6">
                      <label for="">Designation</label> <br>
                        <select name="designation" id="designation">
                          <option value="Librarian">Librarian</option>
                          <option value="Counselors">Counselors</option>
                          <option value="Department Heads">Department Heads</option>
                          <option value="Vice Principal">Vice Principal</option>
                          <option value="Principal">Principal</option>
                        </select>
                      </div>
                   <?php } ?>
                    </div>
                </fieldset>
                <fieldset>
                  
                   
                  </fieldset>
                <?php } else { ?>

               <fieldset class="border border-secondary p-3 form-group">
                  <legend class="d-inline w-auto h6">Admission Details</legend>
                    <div class="row">
                    <div class="col-lg">
                        <div class="form-group">
                        <label for="class">Select Class</label>
                                <select name="class" id="class" class="form-control">
                                    <option value="">-Select Class-</option>
                                    <?php 
                                    $args = array(
                                      'type' => 'class',
                                      'status'=> 'publish',
                                      'is_deleted'=> '0'
                                    );
                                    $classes = get_posts($args);
                                    foreach ($classes as $key => $class) { ?>
                                    <option value="<?php echo $class->id?>"><?php echo $class->title ?></option>
                                    <?php } ?>
                                </select> 
                        </div>
                    </div>
                      
                    
                      <div class="col-lg">
                        <div class="form-group">
                          <label for="">Date of Admission</label>
                          <input type="date" class="form-control" placeholder="Date of Admission" name="doa">
                        </div>
                      </div>
                    </div>
                </fieldset>
                <fieldset>
                  <div class="col-lg-12">
                        <div class="form-group">
                          <label for="">GR.NO</label>
                          <select  class="bg-white"  name="" id="">
                            <option value="rollno" name="rollno" id="rollno">
                              <?php 
                                $query = mysqli_query($db_conn,"SELECT * FROM accounts WHERE type = 'student' AND `is_deleted`= 0
                                ORDER BY id DESC LIMIT 1");
                                $student = mysqli_fetch_object($query);
                                $enrol = $student->rollno + 1;
                                echo $enrol;
                               ?>
                            </option>
                          </select>
                        </div>
                      </div>
                   
                  </fieldset>
                <?php }?>
                <form-group><label for="">Upload your photo</label><br><input type="file" name="thumbnail" id="thumbnail" require></form-group><br><br>





                
                <input type="hidden" name="type" value="<?php echo $_REQUEST['user'] ?>">
                <button type="submit" name="submit" class="btn btn-primary"><span id="loader" style='display:none'><i class="fas fa-circle-notch fa-spin"></i></span> Register</button>
              </form>
              <?php } elseif($_GET['action'] == 'fee-payment') { ?>
                <form action="" id="registration-fee" method="post">
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label for="">Reciept Number</label>
                        <input type="text" name="reciept_number" placeholder="Reciept Number" class="form-control">
                      </div>
                      
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label for="">Registration Fee</label>
                        <input type="text" name="registration_fee" placeholder="Registration Fee" class="form-control">
                      </div>
                    </div>

                  </div>
                  <input type="hidden" name="std_id" value="<?php echo isset($_GET['std_id'])?$_GET['std_id']:''?>">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                  </div>  
                </form>
              <?php } ?>
            </div>            
          </div>  
        <?php  } else {?>



          <?php
          if(isset($_GET['action']) && $_GET['action'] == 'edit'){?>
        <p>rgih</p>
        <?php  }?>
        
        <!-- Info boxes -->
        <div class="table-responsive bg-white">
          <table class="table table-bordered">
            <thead>
              <tr class="text-center">
                <th>S.No.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                
                $count =1; 
                $user_query = 'SELECT * FROM accounts WHERE `type` = "'.$_REQUEST['user'].'" AND is_deleted = 0';
                $user_result = mysqli_query($db_conn, $user_query);
                while ($users = mysqli_fetch_object($user_result)) 
                {  
                ?>
                <tr class="text-center">
                  <td ><?=$count++?></td>
                  <td ><?=$users->name?></td>
                  <td ><?=$users->email?></td>
                  <td>
                    <form method="post" action="">
                      <input type="hidden" name="user_id" value="<?=$users->id?>">
                      <button type="submit" name="delete" class="btn btn-danger btn-sm mx-1 px-3">Delete</button>
                      
                    </form>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
        <?php
        if(isset($_POST['delete']))
        {
           $user_id = $_POST['user_id']; 
            $delete_query = "UPDATE accounts SET is_deleted = 1 WHERE id = $user_id";
            mysqli_query($db_conn, $delete_query);

        }?>
         
        <?php }?>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->

<script>
  // jQuery(document).ready(function(){

  // })

  jQuery('#student-registration').on('submit',function(){
    console.log();
    if(true)
    {
      var formdata = jQuery(this).serialize();

      jQuery.ajax({
        type: "post",
        url: "http://localhost/Virtue_of_Excellence/actions/student-registration.php",
        data: formdata,
        dataType : 'json',
        beforeSend: function(){
          jQuery('#loader').show();
        },
        success: function (response) {
          console.log(response);
          if(response.success == true)
          {
            location.href = 'http://localhost/Virtue_of_Excellence/admin/user_account.php?user=student&action=fee-payment&std_id='+response.std_id+'&payment_method='+response.payment_method;
          }
        },
        complete: function(){
          // jQuery('#loader').hide();
        }
      });
    }
    return false;
  });
</script>
<?php include('footer.php') ?>