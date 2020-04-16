<?php 
date_default_timezone_set('PRC');

if($_SERVER['REQUEST_METHOD']==='POST'){
	$time = date('Y-m-d H:i:s',time());
$num=rand(0,9999999999999999);

	
setcookie($num,$_POST['content'],time() + 300000*24*60*60);
	

header('Location:备忘录.php');

}
 ?>


<!DOCTYPE html>
<html lang="en">
<head>s
	<meta charset="UTF-8">
	<title>添加备忘录</title>
	<link rel="stylesheet" href="bootstrap.min.css">
	<style>
		.container{
  			position: relative;
  			max-width: 380px;
  			margin: 70px auto;
  			padding: 0px 30px 30px;
			
  			border-radius: 4px;
  			background-color: #fff;
		}
	</style>
</head>
<body style="background-color: #2f4050">
	<div class="container">
		<h1 class="display-4">添加本地备忘录</h1>
		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
			<div><p>记录时间:<?php echo date('Y-m-d H:i:s',time()); ?></p></div>
			<div class="form-group">
				<label for="content">内容</label>
				<textarea name="content" id="content" cols="30" rows="10" class="form-control" style="resize: none;"></textarea>
			</div>
			<button class="btn btn-primary btn-block">提交</button>
	</form>
	</div>
</body>
</html>