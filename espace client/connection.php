<?php
function connexion()
{
$host="localhost";
$user="root";
$pass="";
$dbname="projet";
$conn= mysqli_connect($host,$user,$pass,$dbname);
if(!$conn)
{
die("probleme de connection");

mysqli_connect_error();
}
else 
{
    return ($conn);
    echo "la connection est établie";
}

}


?>

