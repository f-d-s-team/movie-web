<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="referrer" content="never">
	
<title>主页面</title>

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
                    <li class="active"><a href="index.php"><b>影虫</b></a></li>
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


<!-- Home Section -->

<section id="home">
     <div class="container">
          <div class="row">
				<div class="col-md-12 col-sm-12">
					<div class="col-md-6 col-sm-6" style="text-align: left">
                          <p>在右侧/下侧选择电影分类，可以直接跳转到<font color="#FBA027"><b>类别电影榜单</b></font>排行榜哦~</p>    
                         </div>
					<form action="viewTopList.php" method="post"> 
						<div class="col-md-4 col-sm-4 col-xs-12">  
						<select style="border:2px solid #ffffff;border-radius: 15px;margin-left: 40px; width:350px; height:35px;background:#FBA027;text-align: center;color:#ffffff;" name="category" >
                                    <option value="BDforXuanYi">悬疑（默认选项）</option>
                                    <option value="BDforAiQing">爱情</option>
									<option value="BDforDongHua">动画</option>
									<option value="BDforDongZuo">动作</option>
									<option value="BDforJiLuPian">纪录片</option>
									<option value="BDforJingSong">惊悚</option>
									<option value="BDforJuQing">剧情</option>
									<option value="BDforKeHuan">科幻</option>
									<option value="BDforKongBu">恐怖</option>
									<option value="BDforXiJu">喜剧</option>
									<option value="BDforMaoXian">冒险</option>
									<option value="BDforJiaTing">家庭</option>
									<option value="BDforFanZui">犯罪</option>
									<option value="BDforQiHuan">奇幻</option>
                        </select>
                         </div>
						<div class="col-md-2 col-sm-2 col-xs-12">  
						<input type="submit" style="border:2px solid #FBA027;border-radius: 15px;margin-left:30px;color:#ffffff; width:120px;height:35px;background:#FBA027;text-align: center" value="点击查看">
                         </div>
						</form>
				</div>
			  	<div class="col-md-12 col-sm-12">
				  <br>
				  </div>
			  <div class="col-md-12 col-sm-12">
				  <div class="col-md-6 col-sm-6" style="text-align: left">
                          <p>在右侧/下侧输入电影名称，可以查看<font color="#FBA027"><b>电影推荐</b></font>哦~</p>    
                         </div>
					<form action="single-project.php" method="post"> 
						<div class="col-md-4 col-sm-4 col-xs-12">  
						<input type="text" class="form-control" style="margin-left: 40px" name="searchmovie" placeholder="在这里键入电影名称~">
                         </div>
						<div class="col-md-2 col-sm-2 col-xs-12">  
						<input type="submit" style="border:2px solid #FBA027;border-radius: 15px;margin-left:30px;color:#ffffff; width:120px;height:35px;background:#FBA027;text-align: center" value="点击搜索">
                         </div>
					</form>
			</div>
               <div class="col-md-12 col-sm-12">
                 <h2><br>Still don't know which movies to watch?</h2>
                 <h2><strong>还在为找不到适合自己的电影而烦恼？</strong></h2><br/>

               </div>

          </div>
     </div>
</section>

<section id="home2">
     <div class="container">
          <div class="row">

               <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                 <h3 style="background: #FBA027;border-radius: 35px; padding:15px 40px"><strong>来看看以下的热门推荐吧！</strong></h3>
               </div>

          </div>
     </div>
</section>
<!-- Portfolio Section -->
					<?php
                        
						$servername = "localhost:3306";
						$hostname = $_SESSION['hostname'];
						$program="/usr/bin/python3 /opt/recommend/Recommend.py {$hostname} 2>error.txt";
                        exec($program,$out,$ret);
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
								$title[]=$row["title"];
								$rating[]=$row["rating"];
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
								$title[]=$row["title"];
								$rating[]=$row["rating"];
								$i = $i+1;
						}
						} else {
							echo "0 results";
						}
						}
						// Check connection
						
						$conn->close();
				  ?><br>
			<form action="single-project.php" method="post" name="a">
				<input type="hidden" name="searchmovie" value="<?php echo $title[0]?>">	
			</form>
			<form action="single-project.php" method="post" name="b">
				<input type="hidden" name="searchmovie" value="<?php echo $title[1]?>">	
			</form>
			<form action="single-project.php" method="post" name="c">
				<input type="hidden" name="searchmovie" value="<?php echo $title[2]?>">	
			</form>
			<form action="single-project.php" method="post" name="d">
				<input type="hidden" name="searchmovie" value="<?php echo $title[3]?>">	
			</form>
			<form action="single-project.php" method="post" name="e">
				<input type="hidden" name="searchmovie" value="<?php echo $title[4]?>">	
			</form>
			<form action="single-project.php" method="post" name="f">
				<input type="hidden" name="searchmovie" value="<?php echo $title[5]?>">	
			</form>
<section id="portfolio">
     <div class="container">
          <div class="row">
			<div class="col-md-12 col-sm-6">
               <div class="col-md-4 col-sm-6">
                    <a href="#" onClick="a.submit()" >
                         <div class="portfolio-thumb">
                              <img src="<?php echo $url[0];?>" style="border-radius: 15px" width="1100" height="1600" class="img-responsive" alt="Portfolio">
                                   <div class="portfolio-overlay" style="border-radius: 15px">
                                        <div class="portfolio-item">
                                             <h3><?php echo $title[0];?></h3>
                                             <small><?php echo "豆瓣分数：", $rating[0], "分"; ?><br></small><small><?php echo "推荐你的指数：", $Score[0]; ?></small>
                                        </div>
                                   </div>
                         </div>
                    </a>
               </div>

               <div class="col-md-4 col-sm-6">
                    <a href="#" onClick="b.submit()" >
                         <div class="portfolio-thumb">
                              <img src="<?php echo $url[1];?>" style="border-radius: 15px" width="1100" height="1600" class="img-responsive" alt="Portfolio">
                                   <div class="portfolio-overlay" style="border-radius: 15px">
                                        <div class="portfolio-item">
                                             <h3><?php echo $title[1];?></h3>
                                             <small>豆瓣分数：<?php echo $rating[1]; ?>分<br></small><small><?php echo "推荐你的指数：", $Score[1]; ?></small>
                                        </div>
                                   </div>
                         </div>
                    </a>
               </div>

               <div class="col-md-4 col-sm-6">
                    <a href="#" onClick="c.submit()" >
                         <div class="portfolio-thumb">
                              <img src="<?php echo $url[2];?>" style="border-radius: 15px" width="1100" height="1600" class="img-responsive" alt="Portfolio">
                                   <div class="portfolio-overlay" style="border-radius: 15px">
                                        <div class="portfolio-item">
                                             <h3><?php echo $title[2];?></h3>
                                             <small>豆瓣分数：<?php echo $rating[2]; ?>分<br></small><small><?php echo "推荐你的指数：", $Score[2]; ?></small>
                                        </div>
                                   </div>
                         </div>
                    </a>
               </div>
			</div>
			<div class="col-md-12 col-sm-6">
               <div class="col-md-4 col-sm-6">
                    <a href="#" onClick="d.submit()" >
                         <div class="portfolio-thumb">
                              <img src="<?php echo $url[3];?>" style="border-radius: 15px" width="1100" height="1600" class="img-responsive" alt="Portfolio">
                                   <div class="portfolio-overlay" style="border-radius: 15px">
                                        <div class="portfolio-item">
                                             <h3><?php echo $title[3];?></h3>
                                             <small>豆瓣分数：<?php echo $rating[3]; ?>分<br></small><small><?php echo "推荐你的指数：", $Score[3]; ?></small>
                                        </div>
                                   </div>
                         </div>
                    </a>
               </div>

               <div class="col-md-4 col-sm-6">
                    <a href="#" onClick="e.submit()" >
                         <div class="portfolio-thumb">
                              <img src="<?php echo $url[4];?>" style="border-radius: 15px" width="1100" height="1600" class="img-responsive" alt="Portfolio">
                                   <div class="portfolio-overlay" style="border-radius: 15px">
                                        <div class="portfolio-item">
                                             <h3><?php echo $title[4];?></h3>
                                             <small>豆瓣分数：<?php echo $rating[4]; ?>分<br></small><small><?php echo "推荐你的指数：", $Score[4]; ?></small>
                                        </div>
                                   </div>
                         </div>
                    </a>
               </div>

               <div class="col-md-4 col-sm-6">
                    <a href="#" onClick="f.submit()" >
                         <div class="portfolio-thumb">
                              <img src="<?php echo $url[5];?>" style="border-radius: 15px" width="1100" height="1600" class="img-responsive" alt="Portfolio">
                                   <div class="portfolio-overlay" style="border-radius: 15px">
                                        <div class="portfolio-item">
                                             <h3><?php echo $title[5];?></h3>
                                             <small>豆瓣分数：<?php echo $rating[5]; ?>分<br></small><small><?php echo "推荐你的指数：", $Score[5]; ?></small>
                                        </div>
                                   </div>
                         </div>
                    </a>
               </div>
			</div>
               <div class="col-md-12 col-sm-12 text-center">
                    <h2>感兴趣了？立即点击下方按钮加入我们，记录你的喜好~</h2>
               </div>
				<div class="col-md-12 col-sm-12 text-center special">
					<a href="blog.html"><span style="font-size:32px;background:#FBA027; padding:5px 15px; border-radius:25px">注册账户</span></a>
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
                    <p>(+28)88888888 / 66666666</p>
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