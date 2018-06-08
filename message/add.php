<?php

header("content-type:text/html;charset=utf8");

include('../Db.class.php');
include('../message.class.php');

$a=new DB();

$data['user']=$_POST['user'];
$data['title']=$_POST['title'];
$data['content']=$_POST['content'];
$date['data']=time();

$pdo=$a->pdo("dayexam");




$message=new Message();

$data =$message->add($pdo,'liuyan',$data);

if($data)
{

	// echo "<script>alert('添加成功');location.href='show.php'</script>";
	 echo "添加成功 3s跳转";
	 // header("Location:show.php");
	 header('Refresh:3,Url=show.php');
}else{
	echo "添加失败";
	 header('Refresh:3,Url=liuyan.php');
}