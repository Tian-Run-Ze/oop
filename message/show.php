<?php
header("content-type:text/html;charset=utf8");

include('../Db.class.php');
include('../message.class.php');

$a=new DB();

$pdo=$a->pdo("dayexam");

$message= new Message();

// var_dump($message);die;

// $sql="select * from liuyan";
// $data = $pdo->query($sql)->fetchAll();
$data=$message->show($pdo,'liuyan');


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加</title>
</head>
<body>
  
<center>
<form action="add.php" method="post">
<table>
	<tr>
		<td>用户名</td>
		<td><input type="text" name="user"></td>
	</tr>
	<tr>
		<td>标题</td>
		<td><input type="text" name="title"></td>
	</tr>
	<tr>
		<td>内容</td>
		<td><textarea name="content" ></textarea></td>
	</tr>
    <tr>
		<td><input type="submit" value="发表留言"></td>
		<td><input type="reset" value="重置"></td>
	</tr>
</form>
</center>

<center>
<?php

foreach ($data as  $value) { ?>

<table>
	<tr>
		<td>用户名</td>
		<td><?php echo $value['user']?></td>
	</tr>
	<tr>
		<td>标题</td>
		<td><?php echo $value['title']?></td>
	</tr>
	<tr>
		<td>内容</td>
		<td><?php echo $value['content']?></td>
	</tr>
	<tr>
		<td>时间</td>
		<td><?php echo date("Y-m-d H:i:s",$value['date'])?></td>
	</tr>
    <tr>
		<td>删除</td>
		<td><a href='delete.php?id=<?php echo $value['id']?>'>删除</a></td>
	</tr>
     <tr>
		<td>修改</td>
		<td><a href='update.php?id=<?php echo $value['id']?>'>修改</a></td>
	</tr>


</table>

<?php } ?>
</center>


</body>
</html>