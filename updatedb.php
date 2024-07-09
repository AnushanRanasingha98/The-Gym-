<?php session_start(); ?>
<?php include_once('connection.php');  ?>
<?php

    $email = $_POST['email'];
    $password = $_POST['password'];
    $uid = $_POST['user_id'];


    $sql = "UPDATE users SET email=?, password=? WHERE id=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ssi",$email, $password, $uid);
    $stmt->execute();

 /*   
    $sql="UPDATE users SET";
    $sql.="First_name={$firstname},";
    $sql.="Last_name={$lastname},";
    $sql.="gender={$gender},";
    $sql.="email={$email},";
    $sql.="password={$password}";
    $sql.="WHERE id={$id} LIMIT 1";
    $result=mysqli_query($connection,$sql);

    
    $sql = "UPDATE users SET". "First_name = $firstname ". "Last_name = $lastname". "gender = $gender". "email = $email "."password = $password "."WHERE id = $uid";

    $result=mysqli_query($connection,$sql);
*/
    if ($stmt) {
        //echo("New record added sucessfully!");
        header('location:users.php');
    }


?>
<?php mysqli_close($connection) ?>