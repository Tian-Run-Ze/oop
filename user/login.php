<?php

header("content-type:text/html;charset=utf8");

include('../Db.class.php');
include('../User.class.php');

$a=new DB();

$user=$_POST['user'];
$password=$_POST['password'];



$pdo=$a->pdo("dayexam");

// var_dump($pdo);die;

$users=new user();

       
// $sql="select * from userm where user='$user'";
// var_dump($sql);die;

// $data = $pdo->query($sql)->fetchAll();
   
$data =$users->login($pdo,$user,$password);


if ($data) {
	echo "<script>alert('登录成功');location.href='../message/show.php'</script>";

} else {
    echo "<script>alert('登录失败,请检验用户名或密码');location.href='login.html'</script>";
}