<?php

header("content-type:text/html;charset=utf8");

include('../Db.class.php');
include('../message.class.php');


$id=$_GET['id'];

$a=new DB();

$pdo=$a->pdo("dayexam");

$message=new Message();

$data=$message->select($pdo,'liuyan',$id);

// var_dump($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>修改</title>
</head>
<body>
	

<center>
<?php

foreach ($data as  $value) { ?>

<h3> 用户名:<?php echo $value['user']?></h3>
<form action="upd.php" method="post">
<input type="hidden" name ="id" value ="<?php echo $value['id']?>" />
  
<table>
	<tr>
		<td>标题</td>
		<td><input type="text" name="title" value="<?php echo $value['title']?>"></td>
	</tr>
	<tr>
		<td>内容</td>
		<td><textarea name="content" ><?php echo $value['content']?></textarea></td>
	</tr>
    <tr>
		<td><input type="submit" value="修改发表"></td>
		<td><input type="reset" value="重置"></td>
	</tr>
</form>
</center>
<?php } ?>
</body>
</html>