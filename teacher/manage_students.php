<?php include('../includes/config.php') ?>
<?php include('header.php') ?>
<?php include('sidebar.php') ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Manage Sections &nbsp;&nbsp;<a href="?action=add_students" class="btn btn-success btn-sm">Add Students</a></h1>
                
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="http://localhost/Virtue_of_Excellence/teacher/dashboard.php">Teacher</a></li>
                    <li class="breadcrumb-item active">Manage Sections</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <?php
        if (isset($_POST['submit_students'])) {
            if (isset($_POST['rollno'])) {
                $rollnos = $_POST['rollno'];
                $students = (isset($_POST['students'])) ? $_POST['students'] : array();
                $class = isset($_POST['class']) ? $_POST['class'] : '';
                $section = isset($_POST['section']) ? $_POST['section'] : '';

                foreach ($rollnos as $key => $rollno) {
                    $rollno = mysqli_real_escape_string($db_conn, $rollno);

                   
                    if (in_array($rollno, $students)) {
                       
                     $query = mysqli_query($db_conn, "INSERT INTO `manage_students_sections` (`rollno`, `name`, `class`, `section`)
                                            SELECT acc.rollno, acc.name, '$class', '$section' 
                                            FROM accounts AS acc WHERE acc.type = 'student' AND acc.rollno = '$rollno'");
                        
                        // header('Location:teacher/manage_students.php');
                    }
                    
                }
            }
        } else { ?>

<?php  if(isset($_GET['action']) && $_GET['action'] == 'add_students') {?>
    <fieldset class="border border-secondary p-3 form-group">   
    <legend class="d-inline w-auto h6">Allocate Students to Sections</legend>
    
            <form action="" method="post" >
                <select name="class" id="class" class="form-control">
                    <option value="">Select Class</option>
                    <?php
                    $query = mysqli_query($db_conn, "SELECT * FROM posts WHERE `type` = 'class' AND `is_deleted`= 0");
                    while ($queryy = mysqli_fetch_object($query)) { ?>
                        <option value="<?= $queryy->id ?>"><?= $queryy->title ?></option>
                    <?php } ?>
                </select>
                <select name="section" id="section" class="form-control my-2">
                    <option value="">Select Section</option>
                    <?php
                    $query = mysqli_query($db_conn, "SELECT * FROM posts WHERE `type` = 'section' AND `is_deleted`= 0 ");
                    while ($queryy = mysqli_fetch_object($query)) { ?>
                        <option value="<?= $queryy->id ?>"><?= $queryy->title ?></option>
                    <?php } ?>
                </select>
                <button type="submit" class="btn btn-primary btn-sm">Submit</button> <br><br>
            </form></fieldset>
<?php } ?>
                  
       
            <?php
            if (isset($_POST['class']) && isset($_POST['section'])) {
                $class = $_POST['class'];
                $section = $_POST['section'];
                ?>
                <form action="" method="post">
                    <div class="card">
                        <div class="card-body">
                        <table class="table-bordered text-center" width="100%">
                        <tr>
                            <th>SrNo</th>
                            <th>rollno</th>
                            <th>Name</th>
                            <th>Class</th>
                            <th>Rollno</th>
                            <th>Status</th>
                            
                        </tr>
                        <tbody>
                            <?php
                            $count = 0;
                            $rollno = 0;
                            $query = mysqli_query($db_conn, "SELECT a.*, p.title AS class_title
                            FROM accounts a
                            JOIN posts p ON a.class = p.id
                            WHERE a.`type` = 'student' AND a.`is_deleted` = '0' AND a.`class` = '$class'
                            ORDER BY a.`name` ASC");

while ($queryy = mysqli_fetch_object($query)) {
$url = $queryy->rollno;
?>
<tr>
  <td><?= ++$count ?></td>
  <td><?= $queryy->rollno ?></td>
  <td><?= $queryy->name ?></td>
  <td><?= $queryy->class_title ?></td> <!-- Display class title instead of ID -->
  <td><?= ++$rollno ?></td>

                                    <td>
                                        <input type="hidden" name="rollno[]" value="<?= $queryy->rollno ?>">
                                        <input type="checkbox" value="<?= $queryy->rollno ?>" name="students[]">
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table><br>
                    <input type="hidden" name="class" value="<?= $class ?>">
                    <input type="hidden" name="section" value="<?= $section ?>">
                    <button type="submit" name="submit_students" class="btn btn-primary btn-sm" value="Submit students">Submit students </button>
                        </div>
                    </div>
                </form>
                
            <?php } ?>
            <fieldset class="border border-secondary p-3 form-group">
        <legend class="d-inline w-auto h6">Select Class to see Students</legend>
       
       <form action="" method="GET" >
        <select name="class" id="class" class="form-control">
            <option value="">Select Class</option>
            <?php 
            $query = mysqli_query($db_conn, "SELECT * FROM posts WHERE `type` = 'class' AND `is_deleted`= 0");
            while ($queryy = mysqli_fetch_object($query)) {
                ?>
                <option value="<?= $queryy->id ?>"><?= $queryy->title ?></option>
            <?php } ?>
        </select>
        <select name="section" id="section" class="form-control my-2">
            <option value="">Select Section</option>
            <?php 
            $query = mysqli_query($db_conn, "SELECT * FROM posts WHERE `type` = 'section' AND `is_deleted`= 0");
            while ($queryy = mysqli_fetch_object($query)) {
                ?>
                <option value="<?= $queryy->id ?>"><?= $queryy->title ?></option>
            <?php } ?>
        </select>
        <button type="submit" class="btn btn-primary btn-sm" name="allocated_students">Submit</button>
    </form>
           
        
    </fieldset>
    
    <?php 
    if (isset($_GET['class']) && isset($_GET['section'])) {
        $class = $_GET['class'];
        $section = $_GET['section'];
        ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Allocated Students for Class:</h3>
                        <table cellpadding="20" class="table-bordered">
                            <tr>
                                <th>Rollno</th>
                                <th>rollno</th>
                                <th>Name</th>
                                <th>Class</th>
                                <th>Section</th>
                            </tr>
                            <?php
                            $count = 0;
                            $rollno = 0;
                            $query = mysqli_query($db_conn, "SELECT m.*, p_class.title AS class_title, p_section.title AS section_title
                            FROM manage_students_sections m
                            JOIN posts p_class ON m.class = p_class.id
                            JOIN posts p_section ON m.section = p_section.id
                            WHERE m.`class` = '$class' AND m.`section` = '$section'");

while ($queryy = mysqli_fetch_object($query)) {
?>
<tr>
  <td><?= ++$rollno ?></td>
  <td><?= $queryy->rollno ?></td>
  <td><?= $queryy->name ?></td>
  <td><?= $queryy->class_title ?></td> <!-- Display class title instead of ID -->
  <td><?= $queryy->section_title ?></td> <!-- Display section title instead of ID -->
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php } } ?>
    
        

    
      </div>
</section>

<?php include('footer.php') ?>
