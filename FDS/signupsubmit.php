<!DOCTYPE html>

<html>
<head>
<meta charset="utf-8">
	<title>注册成功</title>
</head>
<body>
	<div class="col-md-12 col-sm-12 col-xs-12">
		<span style="font-size: 18px">成功注册！<br>您的用户名为：<b><?php echo $_POST['hostname']; ?></b><br>
		注册邮箱为：<?php echo $_POST['email'];?></span><br>
		点击下方按钮跳转回主页！
		<br><br>
	</div>
	
	<div class="col-md-12 col-sm-12 col-xs-12">
		<span style="color: #000000; font-size: 18px;background: #FBA027; padding:2px 5px"><a href="index.html">先不要点这个返回主页</a></span><br><br>
		<form action="index.php" method="post">
			<input type="hidden" name="hostname" value="<?php echo $_POST['hostname']; ?>">
			<input type="submit" value="点这个返回主页">
		</form>
	</div>

	<?php
			$mydbhost = "localhost:3306";
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