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

<title>登录成功</title>

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
<body>
	
<section id="home">
     <div class="container">
          <div class="row">

               <div class="col-md-12 col-sm-12 col-xs-12">
                 <h3>
		<?php
            
			header("Content-Type:text/html;charset=utf8");
			$hostname = $_POST['hostname'];
			$program="/usr/bin/python3 /opt/recommend/Recommend.py {$hostname} 2>error.txt";
            exec($program,$out,$ret);
			$password = $_POST['pwd'];
			$mydbhost = "localhost:3306";
			$mydbuser = "root";
			$mydbpass = 'Zw@445400';
			$conn = mysqli_connect($mydbhost, $mydbuser, $mydbpass);
			if(! $conn){
				die("connect error: " . mysqli_error($conn));
			}
			mysqli_select_db( $conn, 'FDS');
			$sql="select ID from USR where ID = '$hostname' and PassWord = '$password'";
			$retval = mysqli_query($conn, $sql);
			if(! $retval){
				die("create error" . mysqli_error($conn));

			}
			$row = mysqli_fetch_array($retval); //取其中一行
			if ($row > 0) { //判断是否存在
			echo "欢迎'{$hostname}'再次登录";
			} else {
			echo "您还没有账号，请先进行注册！！！";
			header("location:blog.html"); //跳转至注册页面
			}
			$_SESSION['hostname'] = $hostname;
			mysqli_close($conn);
		?>
		
				</h3><br>
				点击下方按钮跳转回主页！
				<br><br>

               </div>
				<div class="col-md-12 col-sm-12 col-xs-12">
				<a href="index.php"><span style="font-size: 24px;background: #D5D5D5; border-radius: 10px; padding: 0px 4px">点击此处跳转回主页！</span></a>
				</div>
			  	
          </div>
     </div>
</section>

	
	

	

</body>
</html>