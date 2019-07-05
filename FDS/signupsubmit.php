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

<title>注册成功页面</title>

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="shortcut icon" href="/images/Logo.png">
<!-- Main css -->
<link rel="stylesheet" href="css/style.css">
<link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,700" rel="stylesheet">
</head>
<script LANGUAGE="javascript">
	$(window).load(function() {
		$("body").css({"background-size":"100% "+$(document).height()+"px"});
	})
	$(window).resize(function () {
		$("body").css({"background-size":"100% "+$(document).height()+"px"});
	});
</script>
	
<script type="text/javascript" color="251,106,39" opacity='2'

        zIndex="-99" count="150" src="js/背景.js">
</script>
<body style="background-attachment:fixed" background="images/background1.jpg">
<section id="home">
     <div class="container">
          <div class="row">	
			<div class="col-md-12 col-sm-12 col-xs-12">
				<h3>成功注册！<br>欢迎您加入我们<b>ForCinema</b>的大家庭~<br><br>您的用户名为：<span style="background: #FBA027; border-radius: 10px; padding: 0px 4px"><b><?php echo $_POST['hostname']; ?></b></span><br><br>
				注册邮箱为：<span style="background: #FBA027; border-radius: 10px; padding: 0px 4px"><b><?php echo $_POST['email'];?></b></span><br><br>
				<br><br>
				<a href="index.php"><span style="font-size: 24px;background: #D5D5D5; border-radius: 10px; padding: 0px 4px">点击此处跳转回主页！</span></a></h3>
				<br>
			</div>

		</div>
	</div>
</section>
	<?php
            
			$_POST['usrtag'] = implode(',',$_POST['usrtag']);
			$_SESSION['hostname'] = $_POST['hostname'];
			$hostname = $_SESSION['hostname'];
			
			$mydbhost = "localhost:3306";
			$mydbuser = "root";
			$mydbpass = 'Zw@445400';
			$conn = mysqli_connect($mydbhost, $mydbuser, $mydbpass);
			if(! $conn){
				die("connect error: " . mysqli_error($conn));
			}
			mysqli_select_db( $conn, 'FDS');
			$sql="INSERT INTO USR (ID, PassWord, MailBox, Gender, UsrTag) 
			VALUES
			('$_POST[hostname]','$_POST[pwd]','$_POST[email]','$_POST[gender]','$_POST[usrtag]')";
			$retval = mysqli_query($conn, $sql);
			if(! $retval){
				die("create error" . mysqli_error($conn));

			}
			$program="/usr/bin/python3 /opt/recommend/Recommend.py {$hostname} 2>error.txt";
            exec($program,$out,$ret);
			mysqli_close($conn);
			
		?>


</body>
</html>