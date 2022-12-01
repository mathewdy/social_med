<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Sign Up

    <form action="" method="POST">
        <label for="">First Name</label>
        <input type="text" name="first_name">
        <label for="">Last Name</label>
        <input type="text" name="last_name">
        <label for="">Email</label>
        <input type="email" name="email">
        <label for="">Password</label>
        <input type="password" name="password">
        <input type="submit" name="sign_up" value="Sign Up">
    </form>


</body>
</html>


<?php

if(isset($_POST['sign_up'])){

    date_default_timezone_set("Asia/Manila");
    $time= date("h:i:s", time());
    $date = date('y-m-d');


    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $v_token = md5(rand());
    $email_status = 0;
    $user_id = "2022".rand('55555','999999');
    $status = 0;

    //verification

    $sql_verification = "SELECT * FROM users WHERE email = '$email'";
    $run_verification = mysqli_query($conn,$sql_verification);

    if(mysqli_num_rows($run_verification) > 0){
        echo "user already added";
    }else{
        //insert data
        $query_insert = "INSERT INTO users (user_id,first_name,last_name,email,password,v_token,email_status,status,date_time_create,date_time_updated) VALUES ('$user_id', '$first_name', '$last_name', '$email', '$password', '$v_token','$email_status', '$status', '$date $time' , '$date $time')";
        $run_insert = mysqli_query($conn,$query_insert);
    
        if($run_insert){
            echo "added";
        }else{
            echo "error" . $conn->error;
        }
    }

 
}

?>