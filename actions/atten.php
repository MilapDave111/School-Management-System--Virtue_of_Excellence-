<?php include('../includes/config.php') ?>
<?php
if(isset($_POST['submit_2']))
{
    if(isset($_POST['clicked']) && ($_POST['clicked']) == ($_POST['click']))
    {
        $status = 'Present';
    }
    else{
        $status = 'Absent';
    }
    $type = 'student';
    $date_add = date('Y-m-d g:i:s');
    
    $query = mysqli_query($db_conn,"INSERT INTO `attendance` (`meta_id`,`rollno`,`name`, `status`, `type`, `date`)
                                     SELECT acc.id,acc.rollno,acc.name, '$status', '$type', '$date_add' 
                                     FROM accounts AS acc WHERE acc.type = 'student'");
}

?>