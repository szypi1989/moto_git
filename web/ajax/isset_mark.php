<?php
include 'mysql.php';
include 'config.php'; 
 $mysql = new mysql();
    $b=urldecode($_GET['field']);
   // $sql="SELECT DISTINCT mark FROM cars WHERE mark LIKE '%".$b."%'";
    $sql="SELECT DISTINCT mark FROM cars_list WHERE mark LIKE '%".$b."%'";
    $gosql = @mysql_query($sql);
    $num_rows=mysql_num_rows($gosql);
    $array_result=array();
    for($i=0;$i<$num_rows;$i++){  
    $array_result[]=mysql_result($gosql,$i,0);
    }

       echo json_encode($array_result);

?>
