<?php
$con_error="Sorry, Unable to connect";
$conn=mysql_connect("localhost","root","") or die($con_error);
mysql_select_db("pos",$conn) or die($con_error);
$email=$_POST['email'];
$username=$_POST['username'];
$f_name=$_POST['firstname'];
$l_name=$_POST['lastname'];
$password=$_POST['password'];
$rq=mysql_query("INSERT INTO user(email, username, f_name, l_name, password) VALUES ('$email','$username','$f_name','$l_name','$password')");
if($rq){echo "Updated";}



?>