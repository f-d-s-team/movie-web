<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">
<head>
<meta name="referrer" content="never">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<title>电影详情页面</title>

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="shortcut icon" href="/images/Logo.png">
<!-- Main css -->
<link rel="stylesheet" href="css/style.css">
<link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,700" rel="stylesheet">

</head>
<body style="background-attachment:fixed" background="images/background1.jpg">
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
                    <li><?php 
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

<!-- Single Project Section -->


					<?php
						$hostname = $_SESSION['hostname'];
				
						
						$myscore = $_POST['usrscore'];
						$mvname = $_POST['searchmovie'];

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
						$sql = "SELECT doubanurl, url, rating FROM Movie_Data where title = '$mvname'";
						$retval = $conn->query($sql);
						if ($retval->num_rows > 0) {
							// output data of each row
							if($row = $retval->fetch_assoc()) {
								$doubanurl = $row["doubanurl"];
								$imgurl = $row["url"];
								$rating = $row["rating"];
							}
						} else {
							echo "0 results";
						}
						$title = $_POST['searchmovie'];
						$conn->close();
				  ?>
					<?php
						$mvname = $_POST['searchmovie'];
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
						$sql = "SELECT * FROM Usr_Score where ID = '$_SESSION[hostname]' and title = '$mvname'";
						$retval = $conn->query($sql);
						if ($retval->num_rows > 0) {
							// output data of each row
							if($row = $retval->fetch_assoc()) {
								$usrscore = $row["rating"];
							}
						} else {
							echo "0 results";
						}
						$conn->close();
				  ?>
		
	
<!--new part or delete-->>	
				<?php
						$hostname = $_SESSION['hostname'];
						$set_charset = 'export LANG=en_US.UTF-8;';
						$mvname = $_POST['searchmovie'];
						$program="/usr/bin/python3 /opt/recommend/Recommend.py {$hostname} {$mvname} 2>error.txt 1>recommend.txt";
                        exec($set_charset.$program,$out,$ret);
						$servername = "localhost:3306";
						$username = "root";
						$password = "Zw@445400";
						$dbname = "FDS";

						// Create connection

						$conn = new mysqli($servername, $username, $password, $dbname);
						$conn->query("set names ’utf8’ ",$dbname);
						
						if($_SESSION['hostname']!=''){
							if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						} 
							$sql = "SELECT Recommend.title, Movie_Data.url, Recommend.Score, Movie_Data.rating FROM Recommend,Movie_Data where ID = '$hostname' and Recommend.title = Movie_Data.title";
							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
							$i = 1;
							// output data of each row
							while($row = $result->fetch_array() and $i < 7) {
								$url[]=$row["url"];
								$Score[]=$row["Score"];
								$title1[]=$row["title"];
								$rating1[]=$row["rating"];
								$i = $i+1;
						}
						} else {
							echo "0 results";
						}
						}else{
							if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						} 
							$sql = "SELECT url, title, rating FROM Movie_Data";
							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
							$i = 1;
							// output data of each row
							while($row = $result->fetch_array() and $i < 7) {
								$url[]=$row["url"];
								$title1[]=$row["title"];
								$rating1[]=$row["rating"];
								$i = $i+1;
						}
						} else {
							echo "0 results";
						}
						}
						// Check connection
						
						$conn->close();
				  ?>
				
			<form action="single-project.php" method="post" name="a">
				<input type="hidden" name="searchmovie" value="<?php echo $title1[0]?>">	
			</form>
			<form action="single-project.php" method="post" name="b">
				<input type="hidden" name="searchmovie" value="<?php echo $title1[1]?>">	
			</form>
			<form action="single-project.php" method="post" name="c">
				<input type="hidden" name="searchmovie" value="<?php echo $title1[2]?>">	
			</form>
			<form action="single-project.php" method="post" name="d">
				<input type="hidden" name="searchmovie" value="<?php echo $title1[3]?>">	
			</form>
			<form action="single-project.php" method="post" name="e">
				<input type="hidden" name="searchmovie" value="<?php echo $title1[4]?>">	
			</form>
			<form action="single-project.php" method="post" name="f">
				<input type="hidden" name="searchmovie" value="<?php echo $title1[5]?>">	
			</form>

	
<section id="single-project">
     <div class="container">
					<div class=" col-sm-12 col-md-12" style="background:rgba(255,255,255,0.15); border-radius: 20px; padding: 10px 20px 20px 20px;">
                      	<h1 id="sptitle" style="color: #ffffff"><?php echo $title;?></h1>
                    	<p id="spdescribe" style="color: #ffffff"><?php echo $title;?></p><br>
						<a href="<?php echo $doubanurl;?>" target="_blank"><span style="background: #FBA027; padding: 5px 20px; border-radius: 18px; color:#FFFFFF; font-weight: normal;">点击跳转到豆瓣</span></a>
                    	<p></p>
                    </div>
			  		<div class="col-md-12 col-sm-12">

					</div>
  </div>


  <div class="col-md-12 col-sm-12" style="color: #ffffff">
						<div class="col-sm-4 col-sm-offset-2 col-md-offset-2 col-md-4 col-xs-offset-2 col-xs-4">
                         <img src="<?php echo $imgurl;?>" style="border-radius: 15px; border: 4px solid #FBA027" alt="About" width="1100" height="1600" class="img-responsive">
                    </div>
                    <div class="col-sm-4 col-md-4 col-xs-12" style="background: rgba(255,255,255,0.15);border-radius: 20px">
					<div class="col-sm-12 col-md-12 col-xs-12" style="text-align: center">
                      	<p></p><br><br>
						<h2>评分分数：<?php echo $rating;?>分</h2>
					</div>
					
					<div class="col-sm-12 col-md-12 col-xs-12" style="text-align: center">
							<h2><?php 
					if($usrscore!=''){
						echo 
					"我的分数："; echo $usrscore ; echo "分";}?></h2>
					</div>
					<div class="col-sm-12 col-md-12 col-xs-12">
					<form action="addscore.php" method="post">
						<div class="col-sm-12 col-md-12 col-xs-12" style="text-align: center;background: rgba(255,255,255,0.15);border-radius: 20px;margin-left: 15px">
						<h3><b>你觉得这部电影能评多少分？</b></h3><br>
							<input type="hidden" class="form-control" name="title" value="<?php echo $_POST['searchmovie']?>">
							<div class="col-sm-2 col-md-2 col-xs-12">
								</div>
							<div class="col-sm-6 col-md-6 col-xs-12">
							<input type="text"  class="form-control"  style="width: 250px;height: 50px;font-size: 28px;text-align: center" name="usrscore" placeholder="请输入0~10的数"><br>
						<div class="col-sm-4 col-md-4 col-xs-12">
						<input type="submit" style="border:1px solid #FBA027;border-radius: 20px; width:150px; height:35px;background:#FBA027;text-align: center;color:#ffffff;" value="点击<?php 
					if($usrscore!=''){
						echo 
					"修改";}else{echo "提交";}?>"></div></div></div>
						
					</form>
					</div>
					
                    </div>
	  </div>
 				<div class="col-md-12 col-sm-12 col-xs-12 text-center special">
					<form action="addmovie.php" method="post" name="add">
						<input type="hidden" class="form-control" name="title" value="<?php echo $title?>">
						<input type="hidden" class="form-control" name="doubanurl" value="<?php echo $doubanurl?>">
						<input type="hidden" class="form-control" name="url" value="<?php echo $imgurl?>">
						</form>
					
					<p></p>
					<a href="<?php if ($hostname!=''){
						echo "#";
					}else{
						echo "blog.html";
					}?>" <?php if($hostname!=''){
						echo 'onClick="add.submit()"';
					}?>><span style="font-size:32px;background:#FBA027; padding:5px 15px; border-radius:25px"><?php 
					if($hostname!=''){
						echo 
					"添加至我的看单";}else{echo "注册添加至看单";}?></span></a>
				</div>

			<div class="col-sm-12 col-md-12 col-xs-12">
					<h2><br>相关电影推荐<br></h2>
			</div>
</section>
	<section id="portfolio">
     <div class="container">
          <div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="col-md-4 col-sm-4 col-xs-4">
									<a href="#" onClick="a.submit()" >
										<div class="portfolio-thumb">
										<img src="<?php echo $url[0];?>" style="border-radius: 10px" alt="About" width="1100" height="1600" class="img-responsive">
										<div class="portfolio-overlay" style="border-radius: 10px">
											<div class="portfolio-item" style="text-align: center">
                                             <p><?php echo $title1[0];?></p>
                                             <small>豆瓣分数：<?php echo $rating1[0];?>分</small><br><small>推荐指数：<?php echo $Score[0];?>分</small>
                                       		</div>
										</div>
									</div>
									</a>
								</div>
								<div class="col-md-4 col-sm-4 col-xs-4">
									<a href="#" onClick="b.submit()" >
										<div class="portfolio-thumb">
										<img src="<?php echo $url[1];?>" style="border-radius: 10px" alt="About" width="1100" height="1600" class="img-responsive">
										<div class="portfolio-overlay" style="border-radius: 10px">
											<div class="portfolio-item" style="text-align: center">
                                             <p><?php echo $title1[1];?></p>
                                             <small>豆瓣分数：<?php echo $rating1[1];?>分</small><br><small>推荐指数：<?php echo $Score[1];?>分</small>
                                       		</div>
										</div>
									</div>
									</a>
								</div>
								<div class="col-md-4 col-sm-4 col-xs-4">
									<a href="#" onClick="c.submit()">
										<div class="portfolio-thumb">
										<img src="<?php echo $url[2];?>" style="border-radius: 10px" alt="About" width="1100" height="1600" class="img-responsive">
										<div class="portfolio-overlay" style="border-radius: 10px">
											<div class="portfolio-item" style="text-align: center">
                                             <p><?php echo $title1[2];?></p>
                                             <small>豆瓣分数：<?php echo $rating1[2];?>分</small><br><small>推荐指数：<?php echo $Score[2];?>分</small>
                                       		</div>
										</div>
									</div>
									</a>
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="col-md-4 col-sm-4 col-xs-4">
									<a href="#" onClick="d.submit()">
										<div class="portfolio-thumb">
										<img src="<?php echo $url[3];?>" style="border-radius: 10px" alt="About" width="1100" height="1600" class="img-responsive">
										<div class="portfolio-overlay" style="border-radius: 10px">
											<div class="portfolio-item" style="text-align: center">
                                             <p><?php echo $title1[3];?></p>
                                             <small>豆瓣分数：<?php echo $rating1[3];?>分</small><br><small>推荐指数：<?php echo $Score[3];?>分</small>
                                       		</div>
										</div>
									</div>
									</a>
								</div>
								<div class="col-md-4 col-sm-4 col-xs-4">
									<a href="#" onClick="e.submit()">
										<div class="portfolio-thumb">
										<img src="<?php echo $url[4];?>" style="border-radius: 10px" alt="About" width="1100" height="1600" class="img-responsive">
										<div class="portfolio-overlay" style="border-radius: 10px">
											<div class="portfolio-item" style="text-align: center">
                                             <p><?php echo $title1[4];?></p>
                                             <small>豆瓣分数：<?php echo $rating1[4];?>分</small><br><small>推荐指数：<?php echo $Score[4];?>分</small>
                                       		</div>
										</div>
									</div>
									</a>
								</div>
								<div class="col-md-4 col-sm-4 col-xs-4">
									<a href="#" onClick="f.submit()">
										<div class="portfolio-thumb">
										<img src="<?php echo $url[5];?>" style="border-radius: 10px" alt="About" width="1100" height="1600" class="img-responsive">
										<div class="portfolio-overlay" style="border-radius: 10px">
											<div class="portfolio-item" style="text-align: center">
                                             <p><?php echo $title1[5];?></p>
                                             <small>豆瓣分数：<?php echo $rating1[5];?>分</small><br><small>推荐指数：<?php echo $Score[5];?>分</small>
                                       		</div>
										</div>
									</div>
									</a>
								</div>
							</div>
						</div>


                    <div class="container">
						<div class="row">
					<div class="col-md-12 col-sm-12 text-center special">
						<a href="index.php"><span style="font-size:32px;background:#FBA027; padding:5px 15px; border-radius:25px;">返回首页</span></a>
					</div>
                    <div class="col-md-12 col-sm-12 text-center">
                      <p style="font-size: 18px">我们致力于为您提供完美的观影体验，为您提供预测的最佳观影时间，每一次电影，都会是一次享受。</p>
                      <strong style="color: #ffffff">FDS团队为您倾情呈现</strong>
                    </div>
					</div>
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

               <div class="col-md-offset-1 col-md-4 col-sm-offset-1 col-sm-3" style="padding-top:20px">
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
