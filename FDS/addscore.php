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

<title></title>

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

	<?php
	        
			header("Content-Type:text/html;charset=utf8");
			$hostname = $_SESSION['hostname'];
			$program="/usr/bin/python3 /opt/recommend/Recommend.py {$hostname} 2>error.txt";
            exec($program,$out,$ret);
			$title = $_POST['title'];
			$mydbhost = "localhost:3306";
			$mydbuser = "root";
			$mydbpass = 'Zw@445400';
			$conn = mysqli_connect($mydbhost, $mydbuser, $mydbpass);
			if(! $conn){
				die("connect error: " . mysqli_error($conn));
			}
			mysqli_select_db( $conn, 'FDS');
			$usrscore = $_POST['usrscore'];
			if ($hostname!='') { //判断是否存在
					$sql = "SELECT * FROM Usr_Score where ID = '$hostname' and title = '$title'";
					$retval = mysqli_query($conn, $sql);
					if(! $retval){
							die("create error" . mysqli_error($conn));
					}
					$usrscore = $_POST['usrscore'];
					if($retval->num_rows > 0) {
					// output data of each row
						
						$sql="UPDATE Usr_Score SET rating = '$usrscore' where ID = '$hostname' and title = '$title'";
						$retval = mysqli_query($conn, $sql);
						if(! $retval){
							die("create error" . mysqli_error($conn));
						}	echo "成功！";
					} else {
						$sql="INSERT INTO Usr_Score (ID, title, rating) 
						VALUES
						('$hostname','$title','$_POST[usrscore]')";
						$retval = mysqli_query($conn, $sql);
						if(! $retval){
							die("create error" . mysqli_error($conn));
						}	echo "成功！";
					}
					
			}else{
			echo "您还没有账号，请先进行注册！！！";
			header("location:blog.html"); //跳转至注册页面
			}
			
			mysqli_close($conn);	
	?>
<section id="home">
     <div class="container">
          <div class="row">	
			<div class="col-md-12 col-sm-12 col-xs-12">
				<h3>成功评分！</h3>
				<br><br>
				<form action="single-project.php" method="post">
					<div class="col-md-12 col-sm-12 col-xs-12">
					<input type="hidden" class="form-control" name="searchmovie" value="<?php echo $_POST['title']?>"><br>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-12">
					</div>
					<div class="col-md-4 col-sm-4 col-xs-12">
					<input type="submit" class="form-control" value="点击返回">
					</div>
					<div class="col-md-4 col-sm-4 col-xs-12">
					</div>		
				</form>
				<br>
			</div>

		</div>
	</div>
</section>
</body>
</html>