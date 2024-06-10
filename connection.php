<?php
 $host="bxz3ducvbt8zlq5eftua-mysql.services.clever-cloud.com";
 $user="uckfjannptteicuc";
 $password="Cj4sJBsBzhuHLv5D0LeH";
 $dbname="bxz3ducvbt8zlq5eftua";
 $conn=mysqli_connect($host,$user,$password,$dbname);
 if(mysqli_connect_errno())
 {
 echo("failedto connect db".mysqli_connect_error());
 }
 else 
   echo("<form action='contect.php' method='POST'>");

?>