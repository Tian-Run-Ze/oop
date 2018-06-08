<?php
//用户类
class User
{ 
     //登录
   public function login($pdo,$user,$password)
   {
       
       // $sql="select * from userm where user='$user'";
        $sql ='select * from userm where user="' . $user .'"and password="' . $password . '"';

        $data = $pdo->query($sql)->fetchAll();


       $arr=array();
       foreach ($data as $key => $value) {
       	$arr['user'] =$data[$key]['user'];
       	$arr['password']=$data[$key]['password'];
       }


       if($arr== null)
       {
       	 return 0;
       }elseif ($dat==$password) {
         return 1; 
       }else{
       	return 2;
       }


   }

     //添加
   public function register($pdo,$table_name,$arr)
   {

       $sql = 'insert into '.$table_name;

        $filed = '(';
        $value = " values (";
        foreach ($arr as $key => $val) {
            $filed .= $key.',';
            $value .= "'".$val."'".",";
         }

        $sql .= trim($filed, ',').')'.trim($value, ',').')';
        
       $res= $pdo->exec($sql);
       return $res;

   }

   



}