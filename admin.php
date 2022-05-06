<?php
session_start();

setCookie('array', date("m/d/y H:ia "), 60*24*60*60+time());
$fname=$_SESSION['fname'];
$faname=$_SESSION['lname'];
$email=$_SESSION['email'];
$pass=$_SESSION['pass'];
$datecCreated= $_SESSION['date_create']

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER PAGE</title>
    <link rel="stylesheet" href="sign-up.css">
    <style>
        table, th, td {
  border: 1px solid black;
  font-size:20px;
  width:34%;
    height:20%;
    color:white;
    padding:5px;


}
/* table{
    width:34%;
    height:20%;
    
    
} */
    </style>
</head>
<body>
<h1> Welcome <?php echo $_SESSION['fname']?> To Our Home Page ! <h1>
        

        
<table>

    <tr>
      <th >ID</th>
      <th >Name</th>
      <th >Email</th>
      <th >Password</th>
      <th>Date Created</th>
      <th >date last login</th>

    </tr>
  

    <tr>
      <td></td>
      <td><?php echo $_SESSION['fname'] ;?></td>
      <td><?php echo $_SESSION['email'] ;?></td>
      <td><?php echo $_SESSION['pass'] ;?></td>
      <td><?php echo $datecCreated ?></td>
      <td><?php echo $_COOKIE['FirstName'];?></td>
    </tr>
   
 
</table>
</body>
</html>