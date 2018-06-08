<?php

include('../Db.class.php');
include('../message.class.php');

$a=new DB();

$id=$_POST['id'];
$content=$_POST['content'];

$title=$_POST['title'];


// var_dump($id);die;

$pdo=$a->pdo("dayexam");

$message= new Message();

$data =$message->update($pdo,'liuyan',$id,$content,$title);

if($data){
	echo "<script>alert('留言已修改,跳转留言列表!');location.href='show.php'</script>";
}else{
	echo "<script>alert('留言修改失败,跳转留言列表!');location.href='update.php'</script>";
}
