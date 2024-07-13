<?php include('../includes/config.php');?>
<?php
$error = ''; // Initialize an error message variable

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['sclass'])) {
        $selectedClass = $_POST['sclass'];

        // Perform a database query to fetch students in the selected class
        $sql = "SELECT a.name FROM accounts a
                INNER JOIN othermeta um ON a.id = um.user_id
                INNER JOIN posts p ON um.id = p.id
                WHERE um.meta_key = 'class' AND p.title = 'Class-$selectedClass' AND a.type = 'student'";

        $result = mysqli_query($db_conn, $sql);

        if (!$result) {
            $error = "Error fetching students: " . mysqli_error($db_conn);
        }
    } elseif (isset($_POST['add'])) {
        if (isset($_POST['student'])) {
            $selectedClass = $_POST['selected_class']; // Get the selected class value from the hidden field
            $section = $_POST['section'];
            $studentNames = $_POST['student'];

            foreach ($studentNames as $studentName) {
                $studentName = mysqli_real_escape_string($db_conn, $studentName);
                $rollno = mysqli_real_escape_string($db_conn, $_POST['rollno'][$studentName]);

                // Fetch the corresponding student's ID based on their name
                $query = "SELECT id FROM accounts WHERE type = 'student' AND name = '$studentName'";
                $result = mysqli_query($db_conn, $query);

                if (!$result) {
                    $error = "Error fetching student information: " . mysqli_error($db_conn);
                } else {
                    $row = mysqli_fetch_assoc($result);
                    $studentId = $row['id'];

                    $insertQuery = mysqli_query($db_conn, "INSERT INTO `add_student` (`user_id`, `title`, `class`, `rollno`, `section`)
    VALUES ('$studentId', '$studentName', '$selectedClass', '$rollno', '$section')");

                    if (!$insertQuery) {
                        $error = "Error adding student: " . mysqli_error($db_conn);
                    }
                }
            }
        }
    }
}
?>

<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Managing Students</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="teacher">Teacher</a></li>
                    <li class="breadcrumb-item active">Managing Result</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>


<section class="content">
    <div class="container-fluid">
        <?php if(isset($_GET['action']) && $_GET['action'] == 'view-students') { ?>
        <div class="row">
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="card py-4" style="width:230px; height:70px;  background-color:#1a8cff">
                                    <div class="card-body" style="padding-top:0%; margin-top:0%;text-align:center;" >
                                        <i class=" fas fa-solid fa-user-graduate fa-2x float-lg-left "></i>
                                        <a href ="?action=view-students" class="text-white"><h5><b>View Students</b></h5></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="card py-4" style="width:230px; height:70px;  background-color:#1a8cff">
                                    <div class="card-body" style="padding-top:0%; margin-top:0%;text-align:center;" >
                                        <i class="fas fa-solid fa-user-plus fa-2x float-lg-left "></i>
                                        <a href ="?action=allocate-section" class="text-white"><h5 ><b>&nbsp;Allocate Section</b></h5></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
       <form action="" method="GET">
        <select name="class" id="class">
            <option value="">Select Class</option>
            <?php 
            $query = mysqli_query($db_conn, "SELECT * FROM posts WHERE `type` = 'class' AND `is_deleted`= 0");
            while ($queryy = mysqli_fetch_object($query)) {
                ?>
                <option value="<?= $queryy->title ?>"><?= $queryy->title ?></option>
            <?php } ?>
        </select>
        <select name="section" id="section">
            <option value="">Select Section</option>
            <?php 
            $query = mysqli_query($db_conn, "SELECT * FROM posts WHERE `type` = 'section' AND `is_deleted`= 0");
            while ($queryy = mysqli_fetch_object($query)) {
                ?>
                <option value="<?= $queryy->title ?>"><?= $queryy->title ?></option>
            <?php } ?>
        </select>
        <button type="submit" name="allocated_students">Submit</button>
    </form>
           
        </div>
           

            <?php
            if (isset($_POST['class']) && isset($_POST['section'])) {
                $class = $_POST['class'];
                $section = $_POST['section'];
                ?>
                <form action="" method="post">
                    <table class="table-bordered text-center">
                        <tr>
                            <th>SrNo</th>
                            <th>rollno</th>
                            <th>Name</th>
                            <th>Class</th>
                            <th>rollno</th>
                            <th>Status</th>
                            
                        </tr>
                        <tbody>
                            <?php
                            $count = 0;
                            $rollno = 0;
                            $query = mysqli_query($db_conn, "SELECT * FROM accounts WHERE `type` = 'student' AND `is_deleted` = '0' AND `class` = '$class' ORDER BY `name` ASC");
                            while ($queryy = mysqli_fetch_object($query)) {
                                $url = $queryy->rollno;
                                ?>
                                <tr>
                                    <td><?= ++$count ?></td>
                                    <td><?= $queryy->rollno ?></td>
                                    <td><?= $queryy->name ?></td>
                                    <td><?= $queryy->class ?></td>
                                    <td><?= ++$rollno ?></td>

                                    <td>
                                        <input type="hidden" name="rollno[]" value="<?= $queryy->rollno ?>">
                                        <input type="checkbox" value="<?= $queryy->rollno ?>" name="students[]">
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <input type="hidden" name="class" value="<?= $class ?>">
                    <input type="hidden" name="section" value="<?= $section ?>">
                    <input type="submit" name="submit_students" value="Submit students">
                </form>
            <?php } ?>
        <?php } elseif(isset($_GET['action']) && $_GET['action'] == 'allocate-section') { ?>
        <div class="row">
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="card py-4" style="width:230px; height:70px;  background-color:#1a8cff">
                                    <div class="card-body" style="padding-top:0%; margin-top:0%;text-align:center;" >
                                        <i class=" fas fa-solid fa-user-graduate fa-2x float-lg-left "></i>
                                        <a href ="?action=view-students" class="text-white"><h5><b>View Students</b></h5></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="card py-4" style="width:230px; height:70px;  background-color:#1a8cff">
                                    <div class="card-body" style="padding-top:0%; margin-top:0%;text-align:center;" >
                                        <i class="fas fa-solid fa-user-plus fa-2x float-lg-left "></i>
                                        <a href ="?action=allocate-section" class="text-white"><h5 ><b>&nbsp;Allocate Section</b></h5></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div>
                        <form action="" method="POST">
                            <label for="sclass">Select Class</label>
                            <select name="sclass" id="sclass">
                                <option value="">-Select Class-</option>
                                <?php
                                // Assuming the get_posts() function retrieves class information from the database
                                $args = array(
                                    'type' => 'class',
                                    'status' => 'publish',
                                );
                                $classes = get_posts($args);
                                foreach ($classes as $key => $class) {
                                    echo '<option value="' . $class->id . '">' . $class->title . '</option>';

                                }
                                ?>
                            </select>
                            <button type="submit">Submit</button>
                        </form>
                    </div>
                    <?php if (isset($selectedClass)) {  ?>
                        <form action="" method="POST">
                           
                            <input type="hidden" name="selected_class" value="<?php echo $selectedClass; ?>">

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Student Name</th>
                                        <th>GR.NO</th>
                                        <th>Add</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Check if $result is defined and not empty before iterating through its rows
                                    if (isset($result) && mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $row['name'] ?></td>
                                                <td><?php echo $row['rollno'] ?></td>
                                                <td>
                                                    <input type="checkbox" name="student[]" value="<?php echo $row['name'] ?>">
                                                    <!-- Hidden input to store GR.NO for each student -->
                                                    <input type="hidden" name="rollno[<?php echo $row['name'] ?>]" value="<?php echo $row['rollno'] ?>">
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    } else {
                                        // Display a message or take appropriate action when no students are found.
                                        echo '<tr><td colspan="3">No students found.</td></tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <label for="">Select section</label>
                            <select name="section" id="">
        <option value="">Select section</option>
        <?php
        // Assuming the get_posts() function retrieves section information from the database
        $args = array(
            'type' => 'section',
            'status' => 'publish',
        );
        $sections = get_posts($args);
        foreach ($sections as $key => $section) { // Changed the variable name to $sections
            echo '<option value="' . $section->title . '">' . $section->title . '</option>';
        }
        ?>
        </select>

                            <button type="submit" name="add">Add</button>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
        </div>
        
        <?php } else { ?>
            <div class="row">
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="card py-4" style="width:230px; height:70px;  background-color:#1a8cff">
                                    <div class="card-body" style="padding-top:0%; margin-top:0%;text-align:center;" >
                                        <i class=" fas fa-solid fa-user-graduate fa-2x float-lg-left "></i>
                                        <a href ="?action=view-students" class="text-white"><h5><b>View Students</b></h5></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="card py-4" style="width:230px; height:70px;  background-color:#1a8cff">
                                    <div class="card-body" style="padding-top:0%; margin-top:0%;text-align:center;" >
                                        <i class="fas fa-solid fa-user-plus fa-2x float-lg-left "></i>
                                        <a href ="?action=allocate-section" class="text-white"><h5 ><b>&nbsp;Allocate Section</b></h5></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <?php }?>
    </div><!--/. container-fluid -->
</section>

<?php include('footer.php'); ?>
