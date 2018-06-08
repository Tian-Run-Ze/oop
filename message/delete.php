<?php

header("content-type:text/html;charset=utf8");

include('../Db.class.php');
include('../message.class.php');


$id=$_GET['id'];

$a=new DB();

$pdo=$a->pdo("dayexam");

// var_dump($pdo);die;

$message=new Message();
$data =$message->delete($pdo,'liuyan',$id);

if($data)
{
	echo "<script>alert('删除成功');location.href='show.php'</script>";
}else{
	echo "<script>alert('删除失败');location.href='show.php'</script>";
}
