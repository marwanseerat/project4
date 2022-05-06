<?php
session_start();

$name_regex="/^([a-zA-Z' ]+)$/";
$rexemail = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
$rexpass = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/';
$rexphone = '/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/';
$_SESSION['date_creat']=date("Y-m-d");


if(isset($_POST["btn"])){
	//validation for the firstname
	$fname= $_POST["fname"];
	$_SESSION["fname"] =$fname;
	if(empty($_SESSION["fname"])){
		$fname_ch ="<span style=' color:red; font-family:Chaparral Pro Light;'> Please Enter Your Name !! </span>";
	}else{
		if(preg_match($name_regex,$_SESSION["fname"])){
			$fname_ch ="<span style=' color:green; font-family:Chaparral Pro Light;'> Correct Name </span>";
			$fname_done = true;
		}else{
			"<span style=' color:red; font-family:Chaparral Pro Light;'>  Incorrect Name!! </span>";
		}
	}

	//validation for the middlename
	$medname=$_POST["medname"];
$_SESSION["medname"] = $medname;

if(empty($_SESSION["medname"])){
	$medname_ch ="<span style=' color:red; font-family:Chaparral Pro Light;'> Please Enter Your Name !! </span>";
}else{
	if(preg_match($name_regex,$_SESSION["medname"])){
		$medname_ch ="<span style=' color:green; font-family:Chaparral Pro Light;'> Correct Name </span>";
		$medname_done = true;
	}else{
		"<span style=' color:red; font-family:Chaparral Pro Light;'>  Incorrect Name!! </span>";
	}
}



//validation for the lname
$lname=$_POST["lname"];
$_SESSION["lname"] =$lname; 


if(empty($_SESSION["lname"])){
	$lname_ch ="<span style=' color:red; font-family:Chaparral Pro Light;'> Please Enter Your Name !! </span>";
}else{
	if(preg_match($name_regex,$_SESSION["lname"])){
		$lname_ch  ="<span style=' color:green; font-family:Chaparral Pro Light;'> Correct Name </span>";
		$lname_done  = true;
	}else{
		"<span style=' color:red; font-family:Chaparral Pro Light;'>  Incorrect Name!! </span>";
	}
}


//validation for the dateofbirth
 
$_SESSION["dateofbirth"] =$_POST["dateofbirth"];
if((floor((time() - strtotime($_SESSION['dateofbirth'])) / 31556926)) <16){
	$dob_ch="<span style='color:red ;> You Are Too Young To Register ! </span>";
}else{
	$dob_ch="<span style='color:green ;> Your age is Legal to Register </span>";
	$dob_done=true;
}

//validation for the phone
$phone=$_POST["phone"];
$_SESSION["phone"] = $phone;
if(empty($_SESSION["phone"])){
	$number_ch="<span style=' color:red;> Please Enter Your phone number !! </span>";
	}else{ 
		if(preg_match($rexphone,$_SESSION["phone"])){
			$number_ch="<span style='color:green ;'> Correct Phone Number </span>";
		$number_done=true;
		}else{
			$number_ch="<span style=' color:red ;'> Incorrect Phone Number</span>";
	}}

//validation for the email
$email= $_POST["email"];
$_SESSION["email"] =$email;
if(empty($_SESSION["email"])){
	$email_ch="<span style=' color:red;'> Please Enter Your Email !! </span>";
	}else{ 
		if(preg_match($rexemail,$_SESSION["email"])){
		$email_ch="<span style='color:green ;'> Correct Email </span>";
		$email_done=true;
		}else{
		$email_ch="<span style=' color:red ;'> Incorrect Email</span>";
	}}


//validation for the password
$pass= $_POST["pass"];
$_SESSION["pass"] =$pass;
if(empty($_SESSION["pass"])){
	$Pass_Check="<span style=' color:red; font-family:Chaparral Pro Light;'> Please Enter Your Password ! </span>";}
else{
	$uppercase = preg_match('@[A-Z]@', $_SESSION["pass"]);
	$lowercase = preg_match('@[a-z]@', $_SESSION["pass"]);
	$number    = preg_match('@[0-9]@', $_SESSION["pass"]);
	$specialChars = preg_match('@[^\w]@', $_SESSION["pass"]);
	if($uppercase || !$lowercase || !$number || !$specialChars || strlen($pass) < 8) {
		$Pass_Check= "<span style='color:green ;'> Your Password Is Strong .</span>";
		$Pass_done=true;
	}else{
		$Pass_Check="<span style='color:red ;'> Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.</span>";
	}}

//validation for the confirm password
$conpass=$_POST["conpass"];
$_SESSION["conpass"] =$conpass;

if(empty($_SESSION["conpass"])){
	$conpass_Check="<span style=' color:red; '> Please Enter The Same Password ! </span>";}
else{
	if($_SESSION["pass"] == $_SESSION["conpass"]){
		$conpass_Check="<span style='color:green ;'> Password Match </span>";
		$conpass_done=true;
		}else{
		$conpass_Check="<span style=' color:red ;'> Your Password Dosen't Match ! </span>";
	}}

}

if(
	$fname_done && $medname_done && $lname_done &&  $email_done && $conpass_Check && $dob_done
){
	$_SESSION['array']=array(
		'First Name'=> $_SESSION['fname'],
		'Middle Name'=> $_SESSION['medname'],
		'Last Name'=>$_SESSION['lname'],
		'Email'=> $_SESSION['email'],
		'Password'=> $_SESSION['pass'],
		'Password Confirmation'=> $_SESSION['conpass'],
		'Phone Number'=> $_SESSION['phone'],
		'Date Of Birth'=>$_SESSION['dateofbirth']
	);
	header('location:login.php');
}
else {
	echo 'please check your information';
}











?>





























<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./sign-up.css">
    <title>Document</title>
</head>
<body>
<div class="signup-box">
	<h1> sign up</h1>
	<h4> Create an account, It's free </h4>
	<form action="sign-up.php" method="post">
		<label >First Name</label>
		<input type="text" name="fname" required>
		<br>
		<?php if(isset($fname_ch)){echo $fname_ch;}?>

		<!-- //////////////////////// -->

		<label >Middle Name</label>
		<input type="text" name="medname" required>
		<br>
		<?php if(isset($medname_ch)){echo $medname_ch;}?>

		<!-- //////////////////////// -->

		<label >Last Name</label>
		<input type="text" name="lname" required>
		<br>
		<?php if(isset($lname_ch)){echo $lname_ch;}?>

		<!-- //////////////////////// -->


		<label for="DateofBirth">Date of Birth</label> <br>
        <input type="date" name="dateofbirth"  required>

		<br>
		<?php if(isset($dob_ch)){echo $dob_ch;}?>

		<!-- //////////////////////// -->


		<label >Phone Number</label>
		<input type="tel" name="phone" required>

		<br>
		<?php if(isset($number_ch)){echo $number_ch;}?>



	<!-- //////////////////////// -->


		<label >Email</label>
		<input type="email" name="email" required>
		<br>
		<?php if(isset($email_ch)){echo $email_ch;}?>

	<!-- //////////////////////// -->

		<label >Password</label>
		<input type="password" name="pass" required>
		<br>
		<?php if(isset($Pass_Check)){echo $Pass_Check;}?>
			<!-- //////////////////////// -->

		<label >Confirm Password</label>
		<input type="password" name="conpass" required>

		<br>
		<?php if(isset($conpass_Check)){echo $conpass_Check;}?>

			<!-- //////////////////////// -->


		<!-- <input type="submit" name="btn" value="sign up"> -->
		<button class="btn" type="submit" name="btn" style="width: 57%;height: 5%;margin-top: 32px;background: #072227;color: white; border: none; margin-left: 22%;">sign up</button>

	</form>
	<p > Already have an account <a href="login.html"> Login here</a></p>
</div>


</body>
</html>

