<?php
 
$db_conn = mysqli_connect('localhost', 'root', '', 'virtue2');

if (!$db_conn)
{
    echo "connection fail";
    exit();
}

include('functions.php'); 
?>
