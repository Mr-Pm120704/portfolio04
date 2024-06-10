<?php

$MYSQL_ADDON_HOST="bxz3ducvbt8zlq5eftua-mysql.services.clever-cloud.com";
$MYSQL_ADDON_DB="bxz3ducvbt8zlq5eftua";
$MYSQL_ADDON_USER="uckfjannptteicuc";
$MYSQL_ADDON_PORT="3306";
$MYSQL_ADDON_PASSWORD="Cj;4sJBsBzhuHLv5D0LeH";
$MYSQL_ADDON_URI="mysql://uckfjannptteicuc:Cj4sJBsBzhuHLv5D0LeH@bxz3ducvbt8zlq5eftua-mysql.services.clever-cloud.com:3306/bxz3ducvbt8zlq5eftua";

 $host=getenv($MYSQL_ADDON_HOST);
 $user=getenv($MYSQL_ADDON_USER);
 $password=getenv($MYSQL_ADDON_PASSWORD);
 $dbname=getenv($MYSQL_ADDON_DB);
 $port=getenv($MYSQL_ADDON_PORT);
 $uri=getenv($MYSQL_ADDON_URI);
 $conn=mysqli_connect($host,$user,$password,$dbname,$port,$uri);
 if(mysqli_connect_errno())
 {
 echo("failedto connect db".mysqli_connect_error());
 }
 else 
   echo("<form action='contect.php' method='POST'>");

?>