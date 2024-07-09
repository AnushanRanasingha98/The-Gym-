<?php session_start(); ?>
<?php include_once('connection.php');     ?>

<?php

$errors = array();

if(isset($_POST['submit'])){

    if(!isset($_POST['email']) || strlen(trim($_POST['email'])) <1 ){
        $errors[] = 'Username is Missing or Invalid';
    }
    if(!isset($_POST['password']) || strlen(trim($_POST['password'])) <1 ){
        $errors[] = 'password is Invalid';
    }

    //check for the erros in the form
    if(empty($errors)){
        //save email and password into variables
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $password = mysqli_real_escape_string($connection, $_POST['password']);
        

        $query="SELECT * FROM users WHERE email='{$email}' AND password='{$password}' LIMIT 1";

        $result_set = mysqli_query($connection, $query);
        
        if($result_set){
            //Query successful
            if(mysqli_num_rows($result_set)==1){
                //valid user found
                $user = mysqli_fetch_assoc($result_set);
                //Updating last login
                    $quary = "UPDATE users SET Last_login=NOW()";
                    //$quary .= "WHERE id={$_SESSION['user_id']}  LIMIT 1";

                    $result_set = mysqli_query($connection, $quary);
                //redirect to users.php
                header('Location:users.php');

            }else{
                $errors[] = 'Invalid username / password';
            }
        }else{
            $errors[] = 'Database quary failed';
        }
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="logstyle.css">
    <title>Admin Login</title>
</head>
<body>
    <div class="login">

        <form action="login.php" method="post">
            <fieldset>
                <h1>Admin Login</h1>
                    
                    <?php 
                        //display error magssage
                        if(isset($errors) && !empty($errors)){
                        echo '<p class="error">Invalid Email / Password</p>';
                        }
                    
                    ?>

                    <p>
                        <label for ="email">Email:</label>
                        <input type="email" name="email" id="email" placeholder="Email Address">
                    </p>
                    <p>
                        <label for ="password">Password:</label>
                        <input type="password" name="password" id="password" placeholder="Password">
                    </p>
                    <p>
                        <button type="submit" name="submit">Login</button>
                    </p>

            </fieldset>

    </div>
</body>
</html>
<?php mysqli_close($connection) ?>