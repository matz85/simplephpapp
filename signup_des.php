<?php
	$host='localhost';
	$username='root';
	$pass='';
	$dbname='project';
	$conn=mysqli_connect($host,$username,$pass,$dbname);
	if(mysqli_connect_errno()) {

		die('Connection Failed!' . mysqli_connect_error());
	}

?>

<html>
	<head>
		<title>Sign up Form</title>
	</head>
	<body>
		<?php
			if(isset($_POST['submit']))
			{
			$first=$_POST['first_name'];
			$last=$_POST['last_name'];
			$email=$_POST['email'];
			$year=$_POST['year'];
			$month=$_POST['month'];
			$gender=$_POST['gender'];
			$pass=$_POST['pass'];
			$day=$_POST['day'];
			$dob=$year.'/'.$month.'/'.$day;
			$name=$first.''.$last;
			$repass=$_POST['repass'];
				if(empty($first) ||empty($last) ||empty($email) ||empty($year) 
					||empty($month) ||empty($day) ||empty($gender) ||empty($pass)
					||empty($pass)){
					echo "Please do not leave any field blank!";
				} elseif($pass!=$repass){
					echo "Passwords do not match. Please try again.";
				} else{
					$sql="INSERT INTO newppl(first,last,email,dob,gender,pass) " .
						"VALUES ('$first','$last','$email','$dob','$gender','$pass')";
					$res=mysqli_query($conn,$sql);
					if(!$res){
						die("Query Failed!" . mysqli_error($conn));
					} else{
						echo "Data entered correctly!";
					}
				}



			}
