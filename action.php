<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

<link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
<link rel="stylesheet" href="css/animate.css">

<link rel="stylesheet" href="css/owl.carousel.min.css">
<link rel="stylesheet" href="css/owl.theme.default.min.css">
<link rel="stylesheet" href="css/magnific-popup.css">

<link rel="stylesheet" href="css/aos.css">

<link rel="stylesheet" href="css/ionicons.min.css">

<link rel="stylesheet" href="css/flaticon.css">
<link rel="stylesheet" href="css/icomoon.css">
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-image: url(images/bg_1.jpg)">
<a class="navbar-brand" href="index.html" ><span>Go Back</span></a>
<?php
	include "connection.php";	
	
	 $name=$_POST['name'];
	 $pass=$_POST['pass'];
	
	if($name=="Admin" && $pass=="entered"){
		
	//$query2='select * from customer where Name="'.$uname.'" and Mail="'.$mail.'" and Mobile="'.$mob.'" and Subject="'.$Subject.'" and Message="'.$Message.'"';
	//echo($query2);
	
	//$res=$conn->query($query2);
	$conn = mysqli_connect("localhost","root","","resume");
	$query3="select * from customer";
		//echo($query3);
		$res1=$conn->query($query3);
    }	

 else{
	include "index.html";
	echo "<script>alert('The Password or Username is Incorrect Admin Can only Login..!')</script>";
   }
?>

<?php
// Sample data (you can replace this with data from your database or any other source)

?>

<table>
    <tr>
        <th>S.No</th>
        <th>Name</th>
        <th>Mobile</th>
		<th>Email</th>
		<th>Subject</th>
		<th>Message</th>
    </tr>
	<?php foreach($res1 as $row): ?>
    
    <tr>
        <td><?php echo($row['id']); ?></td>
		<td><?php echo($row['Name']); ?></td>
		<td><?php echo($row['Mobile']); ?></td>
		<td><?php echo($row['Email']); ?></td>
		<td><?php echo($row['Subject']); ?></td>
		<td><?php echo($row['Message']); ?></td>
    </tr>
   
   <?php endforeach; ?>
  </table>

   </body>
 </html>
