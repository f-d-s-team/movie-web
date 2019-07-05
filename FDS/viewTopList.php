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

<title>类别榜单</title>

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="shortcut icon" href="/images/Logo.png">
<!-- Main css -->
<link rel="stylesheet" href="css/style.css">
<link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,700" rel="stylesheet">

</head>
<body style="background-attachment:fixed" background="images/background3.jpg">
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
<!-- PRE LOADER -->

<div class="preloader">
     <div class="sk-spinner sk-spinner-wordpress">
          <span class="sk-inner-circle"></span>
     </div>
</div>

<!-- Navigation section  -->

<div class="navbar navbar-default navbar-static-top" role="navigation">
     <div class="container">

          <div class="navbar-header">
               <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
               </button>
			   <a href="index.php"><img src="images/Logo.png" alt="Blog Image" width="60" height="53" class="img-responsive" style="position: absolute"></a>
		  </div>
          <div class="collapse navbar-collapse"> 
			   <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php">首页</a></li>
                    <li><a href="about.php">联系FDS团队</a></li>
                    <li>
						<?php 
						if($_SESSION['hostname']){
						?><a href="personal-info.php"><?php	echo $_SESSION['hostname'];
						}else{
						?><a href="blog.html">
						<?php echo "注册/登录";
						}
						?></a></li>
               </ul>
	      </div>
     </div>
</div>


<!-- Home Section -->
<?php
	$hostname = $_SESSION['hostname'];
	    $program="/usr/bin/python3 /opt/recommend/Recommend.py {$hostname} 2>error.txt";
        exec($program,$out,$ret);
	?>
<section id="home">
     <div class="container">
          <div class="row">
               <div class="col-md-12 col-sm-12">
                 <h2>Want to know the hottest movies online?</h2>
                <h2><strong> 
				<?php 
					 if($_POST['category']=="BDforXuanYi"){
						 echo "悬疑类别榜单";
					 }elseif($_POST['category']=="BDforAiQing"){
						 echo "爱情类别榜单";
					 }elseif($_POST['category']=="BDforDongHua"){
						 echo "动画类别榜单";
					 }elseif($_POST['category']=="BDforDongZuo"){
						 echo "动作类别榜单";
					 }elseif($_POST['category']=="BDforJiLuPian"){
						 echo "纪录片类别榜单";
					 }elseif($_POST['category']=="BDforJingSong"){
						 echo "惊悚类别榜单";
					 }elseif($_POST['category']=="BDforJuQing"){
						 echo "剧情类别榜单";
					 }elseif($_POST['category']=="BDforKeHuan"){
						 echo "科幻类别榜单";
					 }elseif($_POST['category']=="BDforKongBu"){
						 echo "恐怖类别榜单";
					 }elseif($_POST['category']=="BDforXiJu"){
						 echo "喜剧类别榜单";
					 }elseif($_POST['category']=="BDforMaoXian"){
						 echo "冒险类别榜单";
					 }elseif($_POST['category']=="BDforJiaTing"){
						 echo "家庭类别榜单";
					 }elseif($_POST['category']=="BDforFanZui"){
						 echo "犯罪类别榜单";
					 }else{
						 echo "奇幻类别榜单"; 
					 }
				?>
				</strong></h2><br/>
               </div>

          </div>
     </div>
</section>

<section id="home2">
     <div class="container">
          <div class="row">

               <div class="col-md-12 col-sm-12 text-center" >
                 <h3 style="background: #FBA027;border-radius: 35px; padding:15px 40px"><strong>以下是该类别的热度排行榜~</strong></h3><br><br>
               </div>

          </div>
     </div>
</section>
<section id="home3">
     <div class="container">
          <div class="row">

               <div class="col-md-12 col-sm-12 col-xs-12 text-center" >
				  <div class="col-md-1 col-sm-1 col-xs-12">
				   </div>
				  <div class="col-md-10 col-sm-10 col-xs-12" style="background:rgba(255,255,255,0.4);border-radius: 20px;padding-top: 15px;padding-bottom: 15px">
                 <table align="center" style="color: #ffffff">
				<tr>
				  <b><td>排名&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>评分&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>名称&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>豆瓣链接</td></b></tr>
					<?php
	    				$bdname = $_POST['category'];
						$servername = "localhost:3306";
						$username = "root";
						$password = "Zw@445400";
						$dbname = "FDS";

						// Create connection

						$conn = new mysqli($servername, $username, $password, $dbname);
						$conn->query("set names ’utf8’ ",$dbname);  
						// Check connection
						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						} 

						$sql = "SELECT ranking, rating, title, doubanurl FROM $bdname";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
							$i=0;
							// output data of each row
							while($row = $result->fetch_assoc()) {
						?>
								<tr>
									<td><?php echo $row["ranking"];?></td>
									<td><?php echo $row["rating"];?></td>
									<td><b><?php echo $row["title"];?></b></a></td>
									<td><a href="<?php echo $row["doubanurl"];?>" target="_blank"><?php echo $row["doubanurl"];?></a></td>
								<tr>
						<?php
							}
						} else {
							echo "0 results";
						}
						$conn->close();
				  ?>
				</table>
			  		</div>
				   <div class="col-md-1 col-sm-1 col-xs-12">
					   
				   </div>
				</div>
               </div>
          </div>
</section>
<!-- Portfolio Section -->

<section id="portfolio">
     <div class="container">
          <div class="row">

               <div class="col-md-12 col-sm-12 text-center">
                    <h3><?php if($hostname!=''){
						echo "生活有电影，精彩不断续~";
					}else{ 
							echo "心动了？立即点击下方按钮加入我们，记录你的喜好~";
						}?></h3>
               </div>
			   <div class="col-md-12 col-sm-12 text-center special">
					
				   <?php 
						if($_SESSION['hostname']){
							echo "";
						}else{
						?><a href="blog.html"><span style="font-size:32px;background:#FBA027; padding:5px 15px; border-radius:25px">
						<?php echo "注册账户";
						}
						?></span></a>
		       </div>
          </div>

     </div>
</section>

<!-- Footer Section -->

<footer>
     <div class="container">
          <div class="row" style="background:rgba(255,255,255,0.1);border-radius: 20px">

               <div class="col-md-3 col-sm-3" style="padding-top:15px">
                    <img src="images/Logo.png" alt="Blog Image" width="80" height="53" class="img-responsive">
               </div>

               <div class="col-md-4 col-sm-4" style="padding-top:20px">
                    <p>Xi'an JiaoTong University</p>
				    <p>Xi'an Fengxianghudong Company</p>
               </div>

               <div class="col-md-offset-1 col-md-4 col-sm-3" style="padding-top:20px">
                    <p><a href="mailto:youremail@gmail.com">hello@fdsstudio.com</a></p>
                    <p>(+28)88888888/ 66666666</p>
               </div>

               <div class="clearfix col-md-12 col-sm-12" style="height: 30px">
                    <hr>
               </div>

               <div class="col-md-6 col-sm-6">
                    <div class="footer-copyright">
                         <p><b>© 2019 FDS Studio | All Rights Reserved.</b></p>
                    </div>
               </div>

               <div class="col-md-6 col-sm-6">
                    <ul class="social-icon">
                         <li><a href="#" class="fa fa-facebook"></a></li>
                         <li><a href="#" class="fa fa-twitter"></a></li>
                         <li><a href="#" class="fa fa-linkedin"></a></li>
                    </ul>
               </div>
               
          </div>
     </div>
</footer>


<!-- SCRIPTS -->

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/custom.js"></script>

</body>
</html>