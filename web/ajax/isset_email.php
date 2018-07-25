<?php
include 'mysql.php';
include 'config.php'; 
 $mysql = new mysql();
   $sql="SELECT id FROM fos_user WHERE email= '".$_GET["field"]."'";
            $gosql = @mysql_query($sql);
            $num_rows = mysql_num_rows($gosql);
            echo $num_rows;
?>
