<?php  //$pass_sts=0;
     include "connection.php";	
  if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $name=$_POST["name"];
        $mail=$_POST["email"];
        $mob=$_POST["num"];
        $Subject=$_POST["sub"];
        $Message=$_POST["message"];
	//$cpass=$_POST["cpass"];
    if(strpos($mail,"@")==false)
	{
		echo "<script>alert('The E-Mail Is Invalid Or Empty.!')</script>";
		include "contect.html";
	}
    elseif(strlen($mob)!=10)
	{
		echo "<script>alert('The Mobile Number Is Invalid Or Empty.!')</script>";
		include "contect.html";
	}
	
	/*if(!preg_match("/chettinadtech/",$mail))
	{
		echo("Not a member of chettinadtech domain");
	}
	if($pass!=$cpass)
	{
		echo("Password mismatch");
	}*/
	else{
	$conn = mysqli_connect("localhost","root","","resume");
	if($conn->connect_error){
		echo "<script>alert('Error sending message')</script>";
	}
	else{
		include "upload.html";
	$query1='insert into customer (Name,Email,Mobile,Subject,Message) values("'.$name.'","'.$mail.'","'.$mob.'","'.$Subject.'","'.$Message.'")';
	//echo($query1);
	$conn->query($query1);
	echo "<script>alert('message was sent successfully......!')</script>";
	}
    }
    }
?>