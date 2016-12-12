<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
	<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
	<script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/index.css">
</head>
<body>
<div id="header">
	<div class="container">
		<nav class="navbar navbar-inverse" role="navigation">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
						data-target="#example-navbar-collapse">
					<span class="sr-only">切换导航</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php">书吧</a>
			</div>
			<div class="collapse navbar-collapse" id="example-navbar-collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="index.php">网站首页</a></li>
					<li><a href="about.html">关于我们</a></li>
					<li><a href="list.html">图书展示</a></li>
					<li><a href="#">联系我们</a></li>
					<li><a href="shopCar.html">购物车</a></li>
					<li><a href="addBooks.html">添加图书</a></li>
				</ul>
			</div>
		</nav>
	</div>
</div>
<div id="wrap">
	<div class="container">
		<div class="col-xs-9">
			<div class="jumbotron">
				<h1>我的书城</h1>
				<p>这里拥有世界各地的书籍，只有你想不到，没有我们这里没有的图书</p>
				<img src="http://img5.imgtn.bdimg.com/it/u=1486454996,567392901&fm=21&gp=0.jpg" alt="" class=".img-responsive">
			</div>
		</div>
		<div class="col-xs-3">

				<?php
           	  session_start();
           	    if(!empty($_SESSION['username'])) {
           	            echo $_SESSION['username']."欢迎你登陆!"."<span onclick='zhuxiao()'>&nbsp;&nbsp;&nbsp;注销</span>"."<div class='wzj' style='display:none;'>
                                                                                                        <h3>快速登录</h3>
                                                                                                         <div action='' role='form'>
                                                                                                         	<div class='form-group'>
                                                                                                         		<input type='text' placeholder='用户名' class='form-control' id='username'>
                                                                                                         	</div>
                                                                                                         	<div class='form-group'>
                                                                                                         		<input type='password' placeholder='密码' class='form-control' id='pwd'>

                                                                                                         	</div>
                                                                                                         	<div class='form-group text-center'>
                                                                                                         		<input type='submit' value='登录' class='btn btn-default' id='dl'>
                                                                                                         		<div style='display: inline-block;width: 20px;'></div>
                                                                                                         		<input type='submit' value='注册' class='btn btn-default' id='zz'>
                                                                                                         	</div>
                                                                                                         </div>
                                                                                                 </div>";
           	    }else{
           	   echo "<div class='wzj'>
                                            <h3>快速登录</h3>
                                             <div action='' role='form'>
                                             	<div class='form-group'>
                                             		<input type='text' placeholder='用户名' class='form-control' id='username'>
                                             	</div>
                                             	<div class='form-group'>
                                             		<input type='password' placeholder='密码' class='form-control' id='pwd'>

                                             	</div>
                                             	<div class='form-group text-center'>
                                             		<input type='submit' value='登录' class='btn btn-default' id='dl'>
                                             		<div style='display: inline-block;width: 20px;'></div>
                                             		<input type='submit' value='注册' class='btn btn-default' id='zz'>
                                             	</div>
                                             </div>
                                     </div>";

           	    }

           	?>

			<span id="p"></span>
			<div class="wzz">
				<h3>快速注册</h3>
				<span id="da"></span>
				<div action="" role="form">
					<div class="form-group">
						<input type="text" placeholder="用户名" class="form-control" id="name">
					</div>
					<div class="form-group">
						<input type="password" placeholder="密码" class="form-control" id="password">

					</div>
					<div class="form-group text-center">
						<input type="submit" value="登录" class="btn btn-default" id="login">
						<div style="display: inline-block;width: 20px;"></div>
						<input type="submit" value="注册" class="btn btn-default" id="zj">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


</body>
<script>
	var lg =document.querySelector(".col-xs-3 .wzj");
	var reg = document.querySelector(".col-xs-3 .wzz");
	var dl=document.querySelector(".wzj #dl ");
	var zhuce =document.querySelector("#zz");
	var login =document.querySelector(".col-xs-3 .wzz #login");
	var zj=document.querySelector(".col-xs-3 .wzz #zj")
	    zhuce.onclick=function () {
            lg.style.display="none";
            reg.style.display="block";
        }

        login.onclick=function () {
        		lg.style.display="block";
        		reg.style.display="none";
        	}



	dl.onclick=function () {
               var username=$("#username").val();
               var pwd = $("#pwd").val();
               $.ajax({
               	type:"post",
               	url:"login.php",
               	async:true,
               	dataType:"json",
               	data:{
               		username:username,
               		pwd:pwd
               	},
               	success:function(data){
               		console.log(data)
               		//接收后台返还的信息
               		if(data.status==1){
//               			alert("登录成功");
               		}else{
//               			alert("登录失败");
               		}
               		window.location.href='index.php';
               	}

               });
       }
                	zj.onclick=function () {
                		var name=$("#name").val();
                		var password = $("#password").val();
                		var p = document.querySelector(".wzz #da");
                		$.ajax({
                			type:"post",
                			url:"reg.php",
                			async:true,
                			dataType:"json",
                			data:{
                				username:name,
                				pwd:password,
                			},
                			success:function (data) {
                				console.log(data);
                				if(data.cc==1){
                                    alert("成功");
                				}else{
                                    p.innerHTML="用户名已存在";
                				}
                			}
                		})
                	}

    function zhuxiao(){
    var username=$("#username").val();
         $.ajax({
        	type:"post",
        	url:"zx.php",
        	async:true,
        	dataType:"json",
        	success:function(data){
                 if(data.status==1){
                 }else{
                 }
                 window.location.href='index.php';
        	}

        });

    }

</script>
</html>