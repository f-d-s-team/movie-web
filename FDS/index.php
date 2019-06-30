<!DOCTYPE html>

<html lang="en">
<head>

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<title>主页面</title>

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">

<!-- Main css -->
<link rel="stylesheet" href="css/style.css">
<link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,700" rel="stylesheet">

</head>
<body>

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
			   <a href="index.html"><img src="images/Logo.png" alt="Blog Image" width="60" height="53" class="img-responsive" style="position: absolute"></a>
		  </div>

          <div class="collapse navbar-collapse"> 
			   <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="index.html">首页</a></li>
                    <li><a href="about.html">联系FDS团队</a></li>
                    <li><form action="personal-info.php" method="post">
							<input type="hidden" name="hostname" value="<?php echo $_POST['hostname']; ?>">
							<input type="submit" value="<?php echo $_POST['hostname']; ?>">
						</form></li>
               </ul>
	      </div>
     </div>
</div>


<!-- Home Section -->

<section id="home">
     <div class="container">
          <div class="row">

               <div class="col-md-12 col-sm-12">
                 <h2>Still don't know when to watch the movies in cinema?</h2>
                 <h2><strong>还在为不知道什么时候去影院看电影而烦恼？</strong></h2><br/>

               </div>

          </div>
     </div>
</section>

<section id="home2">
     <div class="container">
          <div class="row">

               <div class="col-md-12 col-sm-12" >
                 <h3 style="background: #FBA027;border-radius: 35px; padding:15px 40px"><strong>来看看以下的热门推荐吧！</strong></h3>
               </div>

          </div>
     </div>
</section>
<!-- Portfolio Section -->

<section id="portfolio">
     <div class="container">
          <div class="row">

               <div class="col-md-4 col-sm-6">
                    <a href="single-project.html">
                         <div class="portfolio-thumb">
                              <img src="images/千与千寻海报.jpg" style="border-radius: 15px" class="img-responsive" alt="Portfolio">
                                   <div class="portfolio-overlay" style="border-radius: 15px">
                                        <div class="portfolio-item">
                                             <h3>千与千寻</h3>
                                             <small>千と千寻の神隠し</small>
                                        </div>
                                   </div>
                         </div>
                    </a>
               </div>

               <div class="col-md-4 col-sm-6">
                    <a href="single-project.html">
                         <div class="portfolio-thumb">
                              <img src="images/绝杀慕尼黑海报.jpg" style="border-radius: 15px" class="img-responsive" alt="Portfolio">
                                   <div class="portfolio-overlay" style="border-radius: 15px">
                                        <div class="portfolio-item">
                                             <h3>绝杀慕尼黑</h3>
                                             <small>Движение вверх</small>
                                        </div>
                                   </div>
                         </div>
                    </a>
               </div>

               <div class="col-md-4 col-sm-6">
                    <a href="single-project.html">
                         <div class="portfolio-thumb">
                              <img src="images/哥斯拉海报.jpg" style="border-radius: 15px" class="img-responsive" alt="Portfolio">
                                   <div class="portfolio-overlay" style="border-radius: 15px">
                                        <div class="portfolio-item">
                                             <h3>哥斯拉:怪兽之王</h3>
                                             <small>Godzilla: King of Monsters</small>
                                        </div>
                                   </div>
                         </div>
                    </a>
               </div>

               <div class="col-md-4 col-sm-6">
                    <a href="single-project.html">
                         <div class="portfolio-thumb">
                              <img src="images/玩具总动员海报.jpg" style="border-radius: 15px" class="img-responsive" alt="Portfolio">
                                   <div class="portfolio-overlay" style="border-radius: 15px">
                                        <div class="portfolio-item">
                                             <h3>玩具总动员4</h3>
                                             <small>Toy Story 4</small>
                                        </div>
                                   </div>
                         </div>
                    </a>
               </div>

               <div class="col-md-4 col-sm-6">
                    <a href="single-project.html">
                         <div class="portfolio-thumb">
                              <img src="images/最好的我们海报.jpg" style="border-radius: 15px" class="img-responsive" alt="Portfolio">
                                   <div class="portfolio-overlay" style="border-radius: 15px">
                                        <div class="portfolio-item">
                                             <h3>最好的我们</h3>
                                             <small>My Best Summer</small>
                                        </div>
                                   </div>
                         </div>
                    </a>
               </div>

               <div class="col-md-4 col-sm-6">
                    <a href="single-project.html">
                         <div class="portfolio-thumb">
                              <img src="images/妈阁是座城海报.jpg" style="border-radius: 15px" class="img-responsive" alt="Portfolio">
                                   <div class="portfolio-overlay" style="border-radius: 15px">
                                        <div class="portfolio-item">
                                             <h3>妈阁是座城</h3>
                                             <small>Ma Ge Shi Zuo Cheng</small>
                                        </div>
                                   </div>
                         </div>
                    </a>
               </div>

               <div class="col-md-12 col-sm-12 text-center">
                    <h3>感兴趣了？立即点击下方按钮加入我们，记录你的喜好~</h3>
               </div>
				<div class="col-md-12 col-sm-12 text-center">
					<a href="blog.html"><span style="font-size:32px;background:#FBA027; padding:5px 15px; border-radius:25px">注册账户</span></a>
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