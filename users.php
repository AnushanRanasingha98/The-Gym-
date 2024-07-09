<?php session_start(); ?>
<?php include_once('connection.php');     ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="user.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-5.0.2/css/bootstrap.min.css"/>
    <title>users</title>
</head>
<body>
    <header>
		<div class="appname">THE GYM</div>
		
	</header>

    <div id="head" class="container-fluid p-3 bg-info"><h3 class="text-center"><strong>ADMINISTRATION</strong></h3></div>
    <div id="navi" class="text text-info">
    </div>

    <div id="content" class="text-center">
    
   <div class="container">
   <button class="btn btn-primary my-5"><a href="useradd.php" class="text-light">Add user</a></button> 
   <button class="btn btn-primary my-5"><a href="login.php" class="text-light">Login page</a></button> 
    <table class="table table-dark">
          <thead>
            <tr>
              <th scope="col">User ID</th>
              <th scope="col">E-mail</th>
              <th scope="col">Password</th>
              <th scope="col">Last Login</th>
              <th scope="col">Oparation</th>
            </tr>
          </thead>
          <tbody>
            
          <?php
            //create connection
            $SELECT="SELECT * FROM users";

            //prepare statement
            $result=mysqli_query($connection,$SELECT);
            
            if($result){            
            while($row=mysqli_fetch_assoc($result)){
            
                $id=$row['id'];
                $email=$row['email'];
                $password=$row['password'];
                $lastlogedin = $row['Last_login'];
                
                
                echo ('<tr>
                              <th scope="row">'.$id.'</th>
                              <td>'. $email.'</td>
                              <td>'.$password.'</td>
                              <td>'.$lastlogedin.'</td>
                              <td>
                              <button class="btn btn-primary"><a href="update.php?updateid='.$id.'"  class="text-light">Update</a></button>
                              <button class="btn btn-danger"><a href="userdelete.php?deleteid='.$id.'"  class="text-light">Delete</a></button>
                              </td>
                        </tr>'); 
            }
            
            }
        
          ?>
          </tbody>     
    </table>
</div>
</div>
</body>
</html>