<?php
$datat = json_decode(file_get_contents('forget.json'),true); 
$data = json_decode(file_get_contents('userjson.json'),true);
if($_SERVER['REQUEST_METHOD']==='POST'){
foreach ($datat as $key ) {
	
	if(!empty($_POST['password']) && $_POST['password']==$key['anser']){
		foreach ($data as $name ){
			$message='验证成功，您的账号为'.':'.'"'.$name['username'].'"'.','.'您的密码为'.':'.'"'.$name['password'].'"';
		}
		
	}else{
		$message="验证失败！请输入正确答案！";
		
	}
}
}


 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>忘记密码</title>
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
	</sty
	</style>
</head>
<body style="background-color: #2f4050;">
	<div class="container" style="width: 30%; margin-top: 150px">
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" autocomplete="off"	>
		<h3 >请输入您的密保答案</h3>
		<?php if(isset($message)): ?>
		<div><h3 style="color:green"><?php echo $message ?></h3></div>
	<?php endif ?>
			<input  class="form-control" type="text" name="password" id="password" ><br>
			<div>
			<div class="text-center" style="float: left;"><button class="btn btn-primary form-control"  >提交</button></div>
			<div class="text-center" style="float: right;"><a class="btn btn-success form-control" href="登录页.php" >返回</a></div>
			</div>
	</form>
	</div>
</body>
</html>