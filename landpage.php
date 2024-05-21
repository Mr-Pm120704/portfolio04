<?php 
	$pass_sts=0;
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $name=$_POST["name"];
        $mail=$_POST["email"];
        $mob=$_POST["num"];
        $pass=$_POST["pass"];
	$cpass=$_POST["cpass"];
	/*if(strlen($mob)!=10)
	{
		echo("Mobile number is invalid");
	}
	if(strpos($mail,"@")==false)
	{
		echo("Invalid E-mail");
	}
	if(!preg_match("/chettinadtech/",$mail))
	{
		echo("Not a member of chettinadtech domain");
	}
	if($pass!=$cpass)
	{
		echo("Password mismatch");
	}*/
	$conn = new mysqli("localhost","root","","examination");
	if($conn->connect_error){
		die("Connection failed");
	}
	$query1='insert into User_register (User_name,pass,mobile,email) values("'.$name.'","'.$pass.'","'.$mob.'","'.$mail.'")';
	echo($query1);
	$conn->query($query1);
	echo("Registration successfully");

    }
?>