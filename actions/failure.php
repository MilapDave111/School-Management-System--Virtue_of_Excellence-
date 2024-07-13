<?php

$status = $_POST["status"];
$firstname = $_POST["firstname"];
$amount = $_POST["amount"];
$txnid = $_POST["txnid"];
$posted_hash = $_POST["hash"];
$key = $_POST["key"];
$productinfo = $_POST["productinfo"];
$email = $_POST["email"];
// $month=$_POST["udf1"];
$salt="";

if(isset($_POST['additionalCharges']))
{
    $additionlCharges = $_POST["additionalCharges"];
    $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
} else 
{
    $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
}
    $hash = hash("sha512", $retHashSeq);
    if($hash != $posted_hash)
    {
        echo 'Invalid Transcation.. ';
    }
    else{
        
        echo "<h3> Thank you. Your Order status is " .$status . "</h3>";
        echo "<h4> Your Transaction ID is " .$txnid . "</h3>";
        
    }


?>
<p><a href="http:?//localhost/Virtue_of_Excellence/test.php" ></a></p>