<?php
session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sign-up.css">
    <title>Document</title>
    <style>
        
        h4{
            font-size:25px;
           
        }
    </style>
</head>
<body>
<div>
        <h1> Welcome <?php echo$_SESSION['fname']." ".$_SESSION['medname']." ".$_SESSION['lname']; ?>  </h1>
        <h4> <b>your email is:</b> <?php echo "<p style='color:white; font-size:30px;'>" . $_SESSION['email'] . "</p>" ?> and your phone number is: <?php echo "<p style='color:white; font-size:30px; '>" . $_SESSION['phone'] . "</p>" ?> </h4>
    </div>
</body>
</html>