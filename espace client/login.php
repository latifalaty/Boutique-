<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="projet.css" />
  
</head>
<body>
<?php
require('connection.php');
session_start();
if (isset($_POST['uname'])){
  
  $username=$_POST['uname'];
  $password=$_POST['password'];
 
 
  $passe=md5($passe);
    $query = "SELECT * FROM `custumer` WHERE uname='$username' and password='".hash('sha256', $password)."'";
  $result = mysqli_query($conn,$query) or die("mysqli_error()");
  $rows = mysqli_num_rows($result);
  if($rows==1){
      $_SESSION['username'] = $username;
      header("Location: index.php");
  }else{
    $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
  }
}
?>
<centre>
  
<a href="projet partie1 .html"><button style="background-color:pink;" class="button" >cliquer ici </button></a></centre>