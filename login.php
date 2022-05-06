<?php
session_start();
$_SESSION['lastLogin']=setCookie('lasttime', time(), time()+604800);
if(isset($_POST['btn'])){
$email = $_SESSION['email'];
$pass = $_SESSION['pass'];

if($email == $_POST['email'] && $pass == $_POST['pass']){
    header('location:welcome.php');
}else{
    echo 'incorrect password and email';
}
   if($email == 'test@gmail.com' && $pass == 'Aabc123'){
    header('location:admin.php');
   }

}

   ?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sign-up.css">
    <title>Document</title>
</head>
<body>
   <div class="login-box">
       <h1>Login</h1>
       <h4>welcom back ! Login with your credentials</h4>
       <form action="login.php" method="post">
        <label >Email</label>
		<input type="email" name="email">
        <!-- <p>Invalid email</p> -->
        <br>
        <?php if(isset($wrong1)){echo $wrong1;}?>
		<label >PassWord</label>
		<input type="password" name="pass" >
        <!-- <p>wrong password</p>  -->
        <br>
        <?php if(isset($wrong2)){echo $wrong2;}?>  
        <button class="btn" type="submit" name="btn" style="width: 57%;height: 5%;margin-top: 32px;background: #072227;color: white; border: none; margin-left: 22%; padding:10px;">Login</button>
       </form>
   </div> 
   <p>Not have an account ? <a href="sign-up.html"> Sign up</a></p>
</body>
</html>