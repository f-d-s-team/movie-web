<!DOCTYPE html>
<?php
session_start();
?>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<title>添加电影至看单页面</title>

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="shortcut icon" href="/images/Logo.png">
<!-- Main css -->
<link rel="stylesheet" href="css/style.css">
<link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,700" rel="stylesheet">
</head>
<body>

	<?php
	        $hostname = $_SESSION['hostname'];
			$mydbhost = "localhost:3306";
			$mydbuser = "root";
			$mydbpass = 'Zw@445400';
			$conn = mysqli_connect($mydbhost, $mydbuser, $mydbpass);
			if(! $conn){
				die("connect error: " . mysqli_error($conn));
			}
			mysqli_select_db( $conn, 'FDS');
			$sql0="SELECT * FROM Usr_Record where ID = '$hostname' and title = '$_POST[title]'";
			$retval0 = mysqli_query($conn, $sql0);
			if(! $retval0){
				die("create error" . mysqli_error($conn));
			}
			$row = mysqli_fetch_array($retval0); //取其中一行
			if ($row > 0) { //判断是否存在
			sleep(1);
			header("location:personal-info.php");
			} else {
			$sql="INSERT INTO Usr_Record (ID, title, url, doubanurl) 
			VALUES
			('$_SESSION[hostname]','$_POST[title]','$_POST[url]','$_POST[doubanurl]')";
			$retval = mysqli_query($conn, $sql);
			if(! $retval){
				die("create error" . mysqli_error($conn));
			}
			sleep(1);
			header("location:personal-info.php");
			}
			
			$program="/usr/bin/python3 /opt/recommend/Recommend.py {$hostname} 2>error.txt";
            exec($program,$out,$ret);
			mysqli_close($conn);
			
		?>
	
</body>
</html>