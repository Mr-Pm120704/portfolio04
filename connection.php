<?php
$host="localhost";
$user="root";
$password="";
$dbname="resume";
$conn=mysqli_connect($host,$user,$password,$dbname);
if(mysqli_connect_errno())
{
echo("failedto connect db".mysqli_connect_error());
}
else 
    echo("<form action='contect.php' method='POST'>");

?>