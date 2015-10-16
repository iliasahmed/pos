<?php
$con_error="Sorry, Unable to connect";
$con=mysql_connect("localhost","root","") or die($con_error);
mysql_select_db("pos",$con) or die($con_error);

$id=$_GET['id'];

$result = mysql_query("delete from product where id=$id");
if($result){
    header("location:delete.php");
}


?>