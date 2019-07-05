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

<title>退出成功页面</title>

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">

<!-- Main css -->
<link rel="stylesheet" href="css/style.css">
<link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,700" rel="stylesheet">
</head>

<body>
<section id="home">
     <div class="container">
          <div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<span style="font-size: 18px"><?php echo $_SESSION['hostname']; ?>已成功退出！</span><br><br>
				期待我们的下次见面！<br><br>
				即将自动跳转到主页。
				<br><br>
			</div>
			<?php
			  $_SESSION = array();
			  if (isset($_COOKIE[session_name()])) {
				  setcookie(session_name(), '', time()-42000, '/');
			  }
			  session_destroy();
			  sleep(1);
			  header("location:index.php");
			  ?>
		</div>
	</div>
</section>
	

</body>
</html>
