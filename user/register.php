<?php

header("content-type:text/html;charset=utf8");

include('../Db.class.php');
include('../User.class.php');

$a=new DB();

$data['user']=$_POST['user'];
$data['password']=$_POST['password'];



$pdo=$a->pdo("dayexam");

$user=new user();


$data =$user->register($pdo,'userm',$data);

if($data)
{

	 echo "<script>alert('注册成功！');location.href='login.html'</script>";
}else{

     echo "<script>alert('对不起注册失败，请重新注册');location.href='register.html'</script>";
	
}




