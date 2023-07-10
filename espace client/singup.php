<?php
session_start();
include("projet1.php");

if(isset($_post['unname'])&& isset($_post['password'])
	&& isset($_post['name'])&& isset($_post['Re_password'])){
		$unname = $_post['uname'];
		$pass = $_post ['password'];
		$re_pass = $_post ['Re_password'];
		$name = $_post ['name'];
		
		$user_data= 'uname='. $uname. 'name=' . $name ;
		
		
		if (empty($unname)) {
			header("location: singup.php?error=User Name is required&&user_data");
			exit();
		}
		else
		if (empty($pass)) {
			header("location: singup.php?error=Password is required&&user_data");
			exit();
		}
		else
		if (empty($re_pass)) {
			header("location: singup.php?error=Re_password is required&&user_data");
			exit();
		}
		else
		if (empty($name)) {
			header("location: singup.php?error=Name is required&&user_data");
			exit();
		}
		if ($pass !==$re_pass) {
			header("location: singup.php?error=the confirmation password does not match&&user_data");
			exit();
		}
		else {
			$pass = md5($pass);
			$sql ="select * from custumer  where user_name='$uname' ";
			$result= mysqli_query($conn,$sql);
			if(mysqli_num_rows($result)>0) {
				header("location: singup.php?error=the username is taken try another&&user_data");
			exit();
			}
			else {
				$sql2= "insert into custumer (user_name , password , name) Values ('$unname', '$pass', '$name')";
				$result2=mysqli_query($conn,$sql2);
				if($result2) {
					header("location: singup.php?success=your accont has been created successfully");
					echo"<script> alter(\"your account has been created successfully\") </script>";
					exit();
				}
				else { 
				
					header("location: singup.php?error=unknown error occurred&&user_data");
				   exit();
				}
			}
		}
	}
	else {
		header("location: singup.php");
		exit();
	}
		
				
				
				
				
				
				
		