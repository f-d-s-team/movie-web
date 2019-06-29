<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<title>个人信息页面</title>

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">

<!-- Main css -->
<link rel="stylesheet" href="css/style.css">
<link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,700" rel="stylesheet">

</head>
<body>

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
			   <a href="index.html"><img src="images/Logo.png" alt="Blog Image" width="60" height="53" class="img-responsive" style="position: absolute"></a>
		  </div>
          <div class="collapse navbar-collapse"> 
			   <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="index.html">首页</a></li>
                    <li><a href="about.html">联系FDS团队</a></li>
                    <li><a href="signout.php">退出</a></li>
               </ul>
	      </div>
     </div>
</div>

<!-- Personal-info Section -->



<section id="personal-info">
     <div class="container">
       <div class="row">
          <div class="col-sm-6 col-md-1">
                         
          </div>
	     <div class="col-sm-6 col-md-6">
          <?php
			session_start();
		 	$hostname = $_SESSION['hostname'];
		 	
		?>
			 <h2><?php echo $hostname; ?></h2>            
         </div>
	   </div>

                    

                 <div class="col-md-12 col-sm-12">
					<div class="col-sm-6 col-md-12">
       				  <p>这里放一句话吧</p>
                    </div>
                    <div class="clearfix"></div>

                     <hr>

                    <h3> &nbsp; &nbsp; &nbsp; 我的看单
                    <hr></h3>
                    <div class="col-md-offset-1 col-md-2 col-sm-6">
                         <img src="images/千与千寻海报.jpg" style="border-radius: 10px" alt="About" width="1100" height="1600" class="img-responsive">
                    </div>
                    <div class=" col-md-2 col-sm-6">
                         <img src="images/千与千寻海报.jpg" style="border-radius: 10px" alt="About" width="1100" height="1600" class="img-responsive">
                    </div>
                    <div class=" col-md-2 col-sm-6">
                         <img src="images/千与千寻海报.jpg" style="border-radius: 10px" alt="About" width="1100" height="1600" class="img-responsive">
                    </div>
                    <div class=" col-md-2 col-sm-6">
                         <img src="images/千与千寻海报.jpg" style="border-radius: 10px" alt="About" width="1100" height="1600" class="img-responsive">
                    </div>
                    <div class=" col-md-2 col-sm-6">
                         <img src="images/千与千寻海报.jpg" style="border-radius: 10px" alt="About" width="1100" height="1600" class="img-responsive">
                    </div>
                    <div class="col-md-2 col-sm-offset-1 col-sm-6"><span><br>
                    <strong>电影名称</strong></span></div>
                    <div class="col-md-2 col-sm-6">
						<span><br/><b>电影名称</b></span>
                    </div>
                    <div class="col-md-2 col-sm-6">
						<span><br/><b>电影名称</b></span>
                    </div>
                    <div class="col-md-2 col-sm-6">
						<span><br/><b>电影名称</b></span>
                    </div>
                    <div class="col-md-2 col-sm-6">
						<span><br/><b>电影名称</b></span>
                    </div>
					 <div class="col-md-12 col-sm-6">
                    </div>
					 <div class="col-md-12 col-sm-6">
                    </div>
					 <div class="col-md-12 col-sm-6">
                    </div>
					 <div class="col-md-offset-1 col-md-2 col-sm-6">
                         <img src="images/千与千寻海报.jpg" style="border-radius: 10px" alt="About" width="1100" height="1600" class="img-responsive">
                    </div>
                    <div class=" col-md-2 col-sm-6">
                         <img src="images/千与千寻海报.jpg" style="border-radius: 10px" alt="About" width="1100" height="1600" class="img-responsive">
                    </div>
                    <div class=" col-md-2 col-sm-6">
                         <img src="images/千与千寻海报.jpg" style="border-radius: 10px" alt="About" width="1100" height="1600" class="img-responsive">
                    </div>
                    <div class=" col-md-2 col-sm-6">
                         <img src="images/千与千寻海报.jpg" style="border-radius: 10px" alt="About" width="1100" height="1600" class="img-responsive">
                    </div>
                    <div class=" col-md-2 col-sm-6">
                         <img src="images/千与千寻海报.jpg" style="border-radius: 10px" alt="About" width="1100" height="1600" class="img-responsive">
                    </div>
                    <div class="col-md-2 col-sm-offset-1 col-sm-6"><span><br>
                    <strong>电影名称</strong></span></div>
                    <div class="col-md-2 col-sm-6">
						<span><br/><b>电影名称</b></span>
                    </div>
                    <div class="col-md-2 col-sm-6">
						<span><br/><b>电影名称</b></span>
                    </div>
                    <div class="col-md-2 col-sm-6">
						<span><br/><b>电影名称</b></span>
                    </div>
                    <div class="col-md-2 col-sm-6">
						<span><br/><b>电影名称</b></span>
                    </div>
					 <div class="col-md-12 col-sm-6">
                    </div>
					 <div class="col-md-12 col-sm-6">
                    </div>
					 <div class="col-md-12 col-sm-6">
                    </div>
                 </div>
                    <div class="clearfix"></div>
				    <div class="col-md-12 col-sm-12 text-center">
                        <h3><span style="background:#FBA027; padding:2px 10px; border-radius: 10px"><a href="index.html">返回主页</a></span></h3>
                    </div>
                    <div class="col-md-12 col-sm-12 text-center">
                      <p>我们致力于为您提供完美的观影体验，为您提供预测的最佳观影时间，每一次电影，都会是一次享受。</p>
                      <strong>FDS团队为您倾情呈现</strong>
                    </div>
               </div>

          </div>
     </div>
</section>

<!-- Footer Section -->
<footer>
     <div class="container">
          <div class="row" style="background: #D3D3D3;border-radius: 20px">

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