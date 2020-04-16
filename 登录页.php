<?php 
date_default_timezone_set('PRC');//设置默认时区为中国

//回发处理函数
function postback () {
	global $massage;
	if (empty($_POST['username'])){
         $massage='请输入用户名和密码!';
         return;
	}
	if (empty($_POST['password'])){
         $massage='请输入密码!';
         return;
	}
$data = json_decode(file_get_contents('userjson.json'),true); //逻辑判断需要注意多个用户的账号遍历验证

	foreach ($data as $user ) {
	
		if($user['username']!==$_POST['username']){
		  
		  	$massage="用户不存在！";
		  	return;
		  	
		  }elseif($user['username']==$_POST['username']&&$user['password']==$_POST['password']){
		  
		  	$massage="登录成功";
		  	header('Location:备忘录.php');
		
			}else{
				$massage= "用户名或密码不正确，请重新输入！";
   			
		}
	}
}
	
	
         
	
 
	

	

	



if($_SERVER['REQUEST_METHOD'] ==='POST'){
	postback();


}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>登录页</title>
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
<body style="background-color: #2f4050;">
	<div class="container" style="margin-top: 150px" >
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>"  method="post" autocomplete="off">
			<h1 class="display-4 text-center">欢迎登录</h1><br>
			<?php if(isset($massage)): ?>
				
				<p class="text-center" style="font-size: 18px;color:red"><?php echo $massage; ?></p>
			<?php endif ?>
			
			<div class="form-group  "><input  class="form-control input-lg" type="text" placeholder="用户名" name="username" id="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''; ?>" ></div><br>
			
		
			
			<div class="form-group"><input  class="form-control input-lg" placeholder="密码" type="password" name="password" id="password"></div><br>
			
			
		
			<button class="btn btn-lg btn-primary  form-control" style="height: 43px" >登录</button>
			<div><div style="float: left;"><a href="忘记密码.php">忘记账号/密码？</a></div><div style="float: right;"><a href="判断账号是否存在页.php">注册账号</a></div></div>
		
	

	</form>
</div>
<script>
function Person(age){
	this.age=age;
}
Person.prototype.eat=function(){
	console.log("人的吃");
}
Person.prototype.say=function(){
	console.log("人说");
}
function Student(){
	
}

Student.prototype=new Person(10)
Student.prototype.study=function(){
	console.log("努力学习");
}
var stu=new Student();
stu.eat();
stu.study();
//function Animal(name,weight){
//	this.name=name;
//	this.weight=weight;
//}
//Animal.prototype.eat=function(){
//	console.log("动物的吃");
//}
//
//function Dog(color){
//	this.color=color;
//}
//Dog.prototype=new Animal("狗子","50kg");
//Dog.prototype.bitperson=function(){
//	console.log("狗咬人");
//}
//function Erha(sex){
//	this.sex=sex;
//}
//
//Erha.prototype=new Dog("黑色");
//Erha.prototype.play=function(){
//	console.log("二哈玩");
//}
//var erha=new Erha("雄性");
//console.log(erha.name,erha.weight,erha.color);
//erha.eat();
//erha.bitperson();
//erha.play();
</script>
</body>
</html>