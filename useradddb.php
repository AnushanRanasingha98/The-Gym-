<?php session_start(); ?>
<?php include_once('connection.php');     ?>
<?php 
//submitting the data to the database


$email=$_POST['email'];
$password = $_POST['password'];

if(!empty($email)|| !empty($password)){
	//inserting valus to the database
	$INSERT="INSERT into users (email, password ) values(?, ?)";

		//prepare statement
		$stmt=$connection->prepare($INSERT);
		$stmt->bind_param("ss",$email, $password);
		$stmt->execute();

		//echo("New record added sucessfully!");
		header('location:users.php');
}
?>
