<!-- <?php
//  include('../includes/config.php');

// if(isset($_POST['type']) && $_POST['type'] == 'student' && isset($_POST['email']) && !empty($_POST['email']))
// {
    // $name = isset($_POST['name'])?$_POST['name']:'';
    // $dob = isset($_POST['dob'])?$_POST['dob']:'';
    // $mobile = isset($_POST['mobile'])?$_POST['mobile']:'';
    // $email = isset($_POST['email'])?$_POST['email']:'';
    // $gender = isset($_POST['gender '])?$_POST['gender ']:'';
    // $address = isset($_POST['address'])?$_POST['address']:'';
    // $country = isset($_POST['country'])?$_POST['country']:'';
    // $state = isset($_POST['state'])?$_POST['state']:'';
    // $zip = isset($_POST['zip'])?$_POST['zip']:'';
    // $password = date('dmY',strtotime($dob));
    // $md_password = md5($password);

    // $father_name = isset($_POST['father_name'])?$_POST['father_name']:'';
    // $father_mobile = isset($_POST['father_mobile'])?$_POST['father_mobile']:'';
    // $mother_name = isset($_POST['mother_name'])?$_POST['mother_name']:'';
    // $mother_mobile = isset($_POST['mother_mobile'])?$_POST['mother_mobile']:'';
    // $parent_address = isset($_POST['parent_address'])?$_POST['parent_address']:'';
    // $parent_country = isset($_POST['parent_country'])?$_POST['parent_country']:'';
    // $parent_state = isset($_POST['parent_state'])?$_POST['parent_state']:'';
    // $parent_zip = isset($_POST['parent_zip'])?$_POST['parent_zip']:'';
    // $rollno = isset($_POST['rollno'])?$_POST['rollno']:'';

    // $school_name = isset($_POST['school_name'])?$_POST['school_name']:'';
    // $previous_class = isset($_POST['previous_class'])?$_POST['previous_class']:'';
    // $status = isset($_POST['status'])?$_POST['status']:'';
    // $total_marks = isset($_POST['total_marks'])?$_POST['total_marks']:'';
    // $obtain_mark = isset($_POST['obtain_mark'])?$_POST['obtain_mark']:'';
    // $previous_percentage = isset($_POST['previous_percentage'])?$_POST['previous_percentage']:'';

    // $class = isset($_POST['class'])?$_POST['class']:'';
    // $section = isset($_POST['section'])?$_POST['section']:'';
    // $subject_streem = isset($_POST['subject_streem'])?$_POST['subject_streem']:'';
    // $doa = isset($_POST['doa'])?$_POST['doa']:'';
    // $type = isset($_POST['type'])?$_POST['type']:'';
    // $date_add = date('Y-m-d');

    // $degree_name = isset($_POST['degree_name'])?$_POST['degree_name']:'';
    // $Expertisised_subjects = isset($_POST['Expertisised_subjects'])?$_POST['Expertisised_subjects']:'';
    // $Teaching_Experiance = isset($_POST['Teaching_Experiance'])?$_POST['Teaching_Experiance']:'';
    // $Criminal_Background = isset($_POST['Criminal_Background'])?$_POST['Criminal_Background']:'';
    

    // $payment_method = isset($_POST['payment_method'])?$_POST['payment_method']:'';
    // $check_query = mysqli_query($db_conn, " SELECT * FROM accounts WHERE email = '$email'");
    // if(mysqli_num_rows($check_query) > 0)
    // {
        // $error = 'Email already exits';
        // echo 'Email Already Exists'; die;
    // }
    // else
    // {
    //     $query = mysqli_query($db_conn, " INSERT INTO accounts (`name`,`email`,`password`,`type`) VALUES ('$name','$email','$password','$type')") or die(mysqli_error($db_conn));
    //     if($query)
    //     {
    //         $user_id = mysqli_insert_id($db_conn);
    //     }  
    
    // }
    // $acc_meta = array(
    //     'dob' => $dob,
    //     'mobile'=> $mobile,
    //     'payment_method'=> $payment_method,
    //     'class' => $class,
    //     'gender' => $gender,
    // );
    // foreach ($acc_meta as $key => $value) {
    //     mysqli_query($db_conn, "INSERT INTO acc_meta (`user_id`,`meta_key`,`meta_value`) VALUES ('$user_id','$key','$value')")
    //     or die(mysqli_error($db_conn));
    // }

//     $response = array(
//         'success' => TRUE ,
//         'payment_method' => $payment_method,
//         'std_id' => $user_id
//     );

//     echo json_encode($response); die;
// }

// ?> -->