<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title></title>
</head>
<body>
	<div class="col-md-12 col-sm-12 col-xs-12">
		<span style="font-size: 18px">成功退出！</span><br>
			点击下方按钮跳转回主页！
		<br><br>
	</div>
	
	<div class="col-md-12 col-sm-12 col-xs-12">
		<span style="color: #000000; font-size: 18px;background: #FBA027; padding:2px 5px"><a href="index.html">返回主页</a></span>
	</div>
	
	<?php
			$_SESSION['hostname']="";
			session_destroy();
		?>

</body>
</html>
