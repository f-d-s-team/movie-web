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

<title>关于我们</title>

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
                    <li class="active"><a href="about.php"><b>联系FDS团队</b></a></li>
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

<?php
	$hostname = $_SESSION['hostname'];
	$program="/usr/bin/python3 /opt/recommend/Recommend.py {$hostname} 2>error.txt";
    exec($program,$out,$ret);
?>

<!-- About Section -->

<section id="about">
     <div class="container">
          <div class="row">

               <div class="col-md-offset-1 col-md-10 col-sm-12">
                    <div class="section-title">                     
                         <h1>FDS团队</h1>
						 <h3 style="color: #ffffff">我们是一个怎么样的团队？</h3>
                    </div>
			
                    <div class="col-md-7 col-sm-12">
                         <img src="images/about-image.jpg" alt="About" class="img-responsive" style="border-radius: 12px">
                    </div>

                    <div class="col-md-5 col-sm-12" style="background:rgba(255,255,255,0.15);border-radius: 20px">
                         <h1>FDS Studio</h1>
                         <p>一个由10个小伙伴组成的团队。<br>一个充满热情的团队。<br>一个为用户创造更多美好回忆的团队。<br><br></p>
                         <p>为全世界热爱电影的人提供专业的电影推荐，通过用户的喜好，匹配用户标签和电影标签等，为用户推荐下一部最适合的电影。<br>如果你希望加入我们团队，可以点击下方邮件链接，我们将尽快给予回信~</p>
						 <p><a href="mailto:1051159246@qq.com">→&nbsp;我们期待你的加入@FDS.com&nbsp;←</a></p>
                    </div>
				 <div class="col-md-12 col-sm-12 col-xs-12">
					 <br><br><br>
				 </div>

			  <div class="col-md-12 col-sm-12" style="background:rgba(255,255,255,0.15);border-radius: 20px;">
				   	
                    <p><br><br>FDS团队的成员均来自于西安交通大学计算机科学与技术专业。<br>具有高水平的学科素养以及丰富的知识储备，为您提供最贴心的的服务。<br>在为期两周的时间里，我们每日每夜敲打键盘，只为荧幕前的你观看最合适的电影，带来最舒适的体验。</p>
                    <p>这里会对工作人员进行简要的介绍</p>

                    <hr>

                    <div class="col-md-4 col-sm-6">
                         <h3>我们速度快</h3>
                         <ul>
                              <li>做东西快</li>
                              <li>运行速度快</li>
                              <li>迭代更新快</li>
                              <li>产品成熟快</li>
                         </ul>
                    </div>

                    <div class="col-md-4 col-sm-6">
                         <h3>我们细节强</h3>
                         <ul>
                              <li>网页页面细节强</li>
                              <li>后台算法考虑细节强</li>
                              <li>服务贴心细节强</li>
                              <li>男生团队就是细节强</li>
                         </ul>
                    </div>

                    <div class="col-md-4 col-sm-6">
                         <h3>我们运行稳</h3>
                         <ul>
                              <li>网站运行稳</li>
                              <li>算法支撑稳</li>
                              <li>团队运作稳</li>
                         </ul>
                    </div>
					</div>

          </div>
		 <div class="col-md-12 col-sm-12 col-xs-12">
			 <br><br>
		 </div>
		 <div class="col-md-12 col-sm-12 col-xs-12">
			 <br><br>
		 </div>
		 <div class="container">
          <div class="row">

               <div class="col-md-offset-1 col-md-10 col-sm-12 col-xs-12" style="background:rgba(255,255,255,0.15);border-radius: 20px">
				   <div class="col-md-2 col-sm-2 col-xs-1">
				   </div>
                   <div class="col-md-8 col-sm-10 col-xs-10" style="background:rgba(255,255,255,0.15);border-radius: 20px; margin-bottom: 20px;margin-top:20px;"> 
				   <div class=" col-md-offset-2 col-md-8 col-sm-12 col-xs-12" style="text-align: center">
                         <h3 style="background:#FBA027; padding:2px 10px; border-radius: 10px;color: #ffffff">发送建议与意见</h3>
                         <h4 style="color:#E0E0E0"><br>您宝贵的意见与建议，能够帮助我们<br>不断改善网站，为您提供更优质的服务。<br></h4>
                    </div>
		<div class="col-md-offset-2 col-md-8 col-sm-12" >
			<div class="col-md-1 col-sm-12">
			</div>
			<div class="col-md-10 col-sm-12" style="text-align: left;color: #ffffff">
				<form action="notesubmit.php" method="post">
					<div class="col-md-12 col-sm-6">
                 		姓名：<input type="text" class="form-control" name="name" placeholder="您的姓名" >
                    </div>
					<div class="col-md-12 col-sm-6">
						<br>
                    </div>
					<div class="col-md-12 col-sm-6">
                 		邮箱：<input type="email" class="form-control" name="email" placeholder="邮箱地址">
                      </div>
					<div class="col-md-12 col-sm-6">
						<br>
                    </div>
					<div class="col-md-12 col-sm-6">
                 		电话：<input type="telephone" class="form-control" name="phone" placeholder="电话号码">
                      </div>
					<div class="col-md-12 col-sm-6">
						<br>
                    </div>
					<div class="col-md-12 col-sm-6">
                    	请选择是否愿意接听来电咨询：<select  name="choice" class="form-control">
                                   <option value="none">是否愿意我们电话联系您？</option>
                                   <option value="yes">好的</option>
                                   <option value="no">算了吧</option>
              			</select>
                      </div>
					<div class="col-md-12 col-sm-6">
						<br>
                    </div>
					<div class="col-md-12 col-sm-12">
              			<textarea name="textarea" rows="5" class="form-control" placeholder="请键入意见详情"></textarea>
                      </div>
					<div class="col-md-12 col-sm-6">
						<br>
                    </div>
					<div class="col-md-3 col-sm-4">
                         </div>
					<div class="col-md-6 col-sm-4">
                 		<input type="submit" class="form-control" style="background: #D5D5D5" value="立即提交"><br>
                         </div>
					<div class="col-md-3 col-sm-4">
                         </div>
				</form>
			</div>
			<div class="col-md-1 col-sm-12">
			</div>
		
	</div>

                 
               </div>
			<div class="col-md-2 col-sm-2 col-xs-1">
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