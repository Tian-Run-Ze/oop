<?php
 //功能类
 class Message{

    //展示
	 public function show($pdo,$table_name)
	 {
		 $sql = "select * from " . $table_name . "";

		  $data=$pdo->query($sql)->fetchAll();
		  $arr = array();
	        foreach ($data as $key => $value) {
	            $arr[$key]['user'] = $data[$key]['user'];
	            $arr[$key]['title'] = $data[$key]['title'];
	            $arr[$key]['content'] = $data[$key]['content'];
	            $arr[$key]['id'] = $data[$key]['id'];
	             $arr[$key]['date'] = $data[$key]['date'];
	        }
	        return $arr;
		
	 }

       //添加
	   public function add($pdo,$table_name,$arr)
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

      
    //删除
      public function delete($pdo,$table_name,$where)
    {
       $sql="delete from ".$table_name." where id=".$where."";
       // $sql="delete from ".$table_name."where=".$where."";

       $res=$pdo->exec($sql);

       return $res;
    }

    //修改
    public function update($pdo,$table_name,$id,$where,$title)
    {

    	$sql="update ".$table_name." set content = '$where',title='$title' where id = '$id' ";

    	$res=$pdo->exec($sql);

    	return $res;
    }

     public function select($pdo,$table_name,$where)
     {
        $sql="select * from ".$table_name." where id=".$where."";

        $data=$pdo->query($sql)->fetchAll();
         $arr = array();
	        foreach ($data as $key => $value) {
	            $arr[$key]['user'] = $data[$key]['user'];
	            $arr[$key]['title'] = $data[$key]['title'];
	            $arr[$key]['content'] = $data[$key]['content'];
	            $arr[$key]['id'] = $data[$key]['id'];
	             $arr[$key]['date'] = $data[$key]['date'];
	        }
	        return $arr;


     }
 

}