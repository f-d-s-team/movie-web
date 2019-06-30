<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>23333</title>
</head>

<body>
<table>
<tr><td>hostname</td></tr>
<tr><td>pwd</td></tr>
	<?php
			$mydbhost = "localhost:3306";
			$mydbuser = "root";
			$mydbpass = 'Zw@445400';
			$conn = mysqli_connect($mydbhost, $mydbuser, $mydbpass);
			if(! $conn){
				die("connect error: " . mysqli_error($conn));
			}
			$sql = "select * from USR";
			$result = mysql_query($sql);
			while($row=mysql_fetch_assoc($result)){
	?>
			<tr><td><?php echo $row['hostname'];?></td>
				<td><?php echo $row['pwd'];?></td>
			</tr>
			<?php
			}
			?>
</table>
	
</body>
</html>