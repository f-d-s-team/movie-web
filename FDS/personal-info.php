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

<title>个人信息页面</title>

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="shortcut icon" href="/images/Logo.png">
<!-- Main css -->
<link rel="stylesheet" href="css/style.css">
<link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,700" rel="stylesheet">

</head>
<body style="background-attachment:fixed" background="images/background2.jpg">
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
                    <li><a href="signout.php">退出<?php echo $_SESSION['hostname']; ?></a></li>
               </ul>
	      </div>
     </div>
</div>

<!-- Personal-info Section -->

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
						
						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						} 
						$sql = "SELECT title, url, doubanurl FROM Usr_Record where ID = '$hostname'";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
							while($row = $result->fetch_array()) {
								$title[]=$row["title"];
								$imgurl[]= $row["url"];
								$url[]=$row["doubanurl"];
						}
								
						} else {
							echo "0 results";
						}

						$conn->close();
				  ?>

<section id="personal-info">
     <div class="container">
       <div class="row">
          <div class="col-sm-6 col-md-1">
                         
          </div>
	     <div class="col-sm-6 col-md-6">

			 <h2><?php echo $_SESSION['hostname']; ?></h2>   

         </div>
	   </div>

                    

                 <div class="col-md-12 col-sm-12" style="color: #ffffff">
					<div class="col-sm-6 col-md-12">
       				  <p style="font-size: 20px"><br><br>希望有你在的每一天，生活都如电影一样精彩。</p>
                    </div>
                    <div class="clearfix"></div>

                     <hr>

                    <h3> &nbsp; &nbsp; &nbsp; 我的看单
                    <hr></h3>
					
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
			<form action="single-project.php" method="post" name="g">
				<input type="hidden" name="searchmovie" value="<?php echo $title[6]?>">	
			</form>
			<form action="single-project.php" method="post" name="h">
				<input type="hidden" name="searchmovie" value="<?php echo $title[7]?>">	
			</form>
			<form action="single-project.php" method="post" name="i">
				<input type="hidden" name="searchmovie" value="<?php echo $title[8]?>">	
			</form>
			<form action="single-project.php" method="post" name="j">
				<input type="hidden" name="searchmovie" value="<?php echo $title[9]?>">	
			</form>

                    <div class="col-md-offset-1 col-md-10 col-sm-6">
					<div class="col-md-2 col-sm-6">
                         <a href="#" onClick="a.submit()">
                         <div class="portfolio-thumb">
                              <img src="<?php echo $imgurl[0]?>" style="border-radius: 10px" width="1100" height="1600" class="img-responsive" alt="&nbsp;">
                                   <div class="portfolio-overlay" style="border-radius: 10px">
                                        <div class="portfolio-item" style="text-align: center">
                                             <strong><?php echo $title[0]?></strong>
                                        </div>
                                   </div>
                         </div>
                    	</a>
                    </div>
                    <div class=" col-md-2 col-sm-6">
                         <a href="#" onClick="b.submit()">
                         <div class="portfolio-thumb">
                              <img src="<?php echo $imgurl[1]?>" style="border-radius: 10px" width="1100" height="1600" class="img-responsive" alt="&nbsp;">
                                   <div class="portfolio-overlay" style="border-radius: 10px">
                                        <div class="portfolio-item" style="text-align: center">
                                             <strong><?php echo $title[1]?></strong>
                                        </div>
                                   </div>
                         </div>
                    	</a>
                    </div>
                    <div class=" col-md-2 col-sm-6">
                         <a href="#" onClick="c.submit()">
                         <div class="portfolio-thumb">
                              <img src="<?php echo $imgurl[2]?>" style="border-radius: 10px" width="1100" height="1600" class="img-responsive" alt="&nbsp;">
                                   <div class="portfolio-overlay" style="border-radius: 10px">
                                        <div class="portfolio-item" style="text-align: center">
                                             <strong><?php echo $title[2]?></strong>
                                        </div>
                                   </div>
                         </div>
                    	</a>
                    </div>
                    <div class=" col-md-2 col-sm-6">
                         <a href="#" onClick="d.submit()">
                         <div class="portfolio-thumb">
                              <img src="<?php echo $imgurl[3]?>" style="border-radius: 10px" width="1100" height="1600" class="img-responsive" alt="&nbsp;">
                                   <div class="portfolio-overlay" style="border-radius: 10px">
                                        <div class="portfolio-item" style="text-align: center">
                                             <strong><?php echo $title[3]?></strong>
                                        </div>
                                   </div>
                         </div>
                    	</a>
                    </div>
                    <div class=" col-md-2 col-sm-6">
                         <a href="#" onClick="e.submit()">
                         <div class="portfolio-thumb">
                              <img src="<?php echo $imgurl[4]?>" style="border-radius: 10px" width="1100" height="1600" class="img-responsive" alt="&nbsp;">
                                   <div class="portfolio-overlay" style="border-radius: 10px">
                                        <div class="portfolio-item" style="text-align: center">
                                             <strong><?php echo $title[4]?></strong>
                                        </div>
                                   </div>
                         </div>
                    	</a>
                    </div>
					</div>
                                        <div class="col-md-offset-1 col-md-10 col-sm-6">
					<div class="col-md-2 col-sm-6">
                         <a href="#" onClick="f.submit()">
                         <div class="portfolio-thumb">
                              <img src="<?php echo $imgurl[5]?>" style="border-radius: 10px" width="1100" height="1600" class="img-responsive" alt="&nbsp;">
                                   <div class="portfolio-overlay" style="border-radius: 10px">
                                        <div class="portfolio-item" style="text-align: center">
                                             <strong><?php echo $title[5]?></strong>
                                        </div>
                                   </div>
                         </div>
                    	</a>
                    </div>
                    <div class=" col-md-2 col-sm-6">
                         <a href="#" onClick="g.submit()">
                         <div class="portfolio-thumb">
                              <img src="<?php echo $imgurl[6]?>" style="border-radius: 10px" width="1100" height="1600" class="img-responsive" alt="&nbsp;">
                                   <div class="portfolio-overlay" style="border-radius: 10px">
                                        <div class="portfolio-item" style="text-align: center">
                                             <strong><?php echo $title[6]?></strong>
                                        </div>
                                   </div>
                         </div>
                    	</a>
                    </div>
                    <div class=" col-md-2 col-sm-6">
                         <a href="#" onClick="h.submit()">
                         <div class="portfolio-thumb">
                              <img src="<?php echo $imgurl[7]?>" style="border-radius: 10px" width="1100" height="1600" class="img-responsive" alt="&nbsp;">
                                   <div class="portfolio-overlay" style="border-radius: 10px">
                                        <div class="portfolio-item" style="text-align: center">
                                             <strong><?php echo $title[7]?></strong>
                                        </div>
                                   </div>
                         </div>
                    	</a>
                    </div>
                    <div class=" col-md-2 col-sm-6">
                         <a href="#" onClick="i.submit()">
                         <div class="portfolio-thumb">
                              <img src="<?php echo $imgurl[8]?>" style="border-radius: 10px" width="1100" height="1600" class="img-responsive" alt="&nbsp;">
                                   <div class="portfolio-overlay" style="border-radius: 10px">
                                        <div class="portfolio-item" style="text-align: center">
                                             <strong><?php echo $title[8]?></strong>
                                        </div>
                                   </div>
                         </div>
                    	</a>
                    </div>
                    <div class=" col-md-2 col-sm-6">
                         <a href="#" onClick="j.submit()">
                         <div class="portfolio-thumb">
                              <img src="<?php echo $imgurl[9]?>" style="border-radius: 10px" width="1100" height="1600" class="img-responsive" alt="&nbsp;">
                                   <div class="portfolio-overlay" style="border-radius: 10px">
                                        <div class="portfolio-item" style="text-align: center">
                                             <strong><?php echo $title[9]?></strong>
                                        </div>
                                   </div>
                         </div>
                    	</a>
                    </div>
					</div>
					 <div class="col-md-12 col-sm-6">
                    </div>
					 <div class="col-md-12 col-sm-6">
                    </div>
					 <div class="col-md-12 col-sm-6">
                    </div>
                 </div>
                    <div class="clearfix"></div>
				    <div class="col-md-12 col-sm-12 text-center special">
                        <span style="font-size:32px;background:#FBA027; padding:5px 15px; border-radius: 25px"><a href="index.php">返回主页</a></span>
                    </div>
                    <div class="col-md-12 col-sm-12 text-center">
                      <p style="font-size: 20px"><br><br>我们致力于为您提供完美的观影体验，为您提供预测的最佳观影时间，每一次电影，都会是一次享受。</p>
                      <strong style="color: #ffffff">FDS团队为您倾情呈现</strong>
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