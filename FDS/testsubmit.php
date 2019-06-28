<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title></title>
</head>
<body>
	<?php echo $_POST['hostname']; ?><br>
	欢迎<?php echo $_POST['pwd']; ?> 
	<?php
		$file_path = "info.txt";
		if(file_exists($file_path)){
			$fp = fopen($file_path, "w");
			$str = $_POST['hostname'] . PHP_EOL . $_POST['pwd'] ;
			fwrite($fp, $str);
			
		}
		fclose($fp);
	?>

	
	<?php
			$mydbhost = "39.105.69.67:8080";
			$mydbuser = "root";
			$mydbpass = 'Zw@445400';
			$conn = mysqli_connect($mydbhost, $mydbuser, $mydbpass);
			if(! $conn){
				die("connect error: " . mysqli_error($conn));
			}
			mysqli_select_db( $conn, 'FDS');
			$sql="INSERT INTO USR (ID, PassWord) 
			VALUES
			('$_POST[hostname]','$_POST[pwd]')";
			$retval = mysqli_query($conn, $sql);
			if(! $retval){
				die("create error" . mysqli_error($conn));

			}
			mysqli_close($conn);
		?>

</body>
</html>
