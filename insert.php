<?php
$isUpdated=false;

if($_SERVER["REQUEST_METHOD"]=="POST") {
    $con_error = "Sorry, Unable to connect";
    $conn = mysql_connect("localhost", "root", "") or die($con_error);
    mysql_select_db("pos", $conn) or die($con_error);
    $p_name=$_POST['p_name'];
    $p_id=$_POST['p_id'];
    $p_price=$_POST['p_price'];
    $rq=mysql_query("INSERT INTO product(p_id, p_name, p_price) VALUES ('$p_id','$p_name','$p_price')");
    if($rq){
        //echo "Update Successful";
        $isUpdated=true;

    }

}
?>

    <!DOCTYPE html>
<html lang="en">
<head>
    <title>Point Of Sale</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../pos/css/bootstrap.min.css">


</head>
<body>
<div class="row" style="background: #0a225e;margin: 0px;">
    <div class="col-md-3">
    </div>
    <div class="col-md-6">

        <h2 style="padding-bottom: 5px"> <font color="#FFFFFF">Point Of Sale </font></h2>

    </div>
    <div class="col-md-3"></div><div class="col-md-3">
        <a href="index.php" class="btn btn-default btn-sm" style="float: right;margin-top: 17px;">Logout</a>
    </div>

</div>
<div class="row" style="margin: 0px">
    <div class="col-md-2" style="background-color: #232324;min-height:570px">
        <div> <a href="dashboard.php"><font color="#f0ffff"><h4><center>Dashboard</center></h4></font></a></div>
        <div> <a href="userinfo.php"><font color="#f0ffff"><h4><center>Users</center></h4></font></a></div>
        <div> <a href="insert.php"><font color="#f0ffff"><h4><center>Insert</center></h4></font></a></div>
        <div> <a href="product.php"><font color="#f0ffff"><h4><center>Product Info</center></h4></font></a></div>
        <div> <a href="delete.php"><font color="#f0ffff"><h4><center>Delete Product</center></h4></font></a></div>
        <div> <a href="update.php"><font color="#f0ffff"><h4><center>Update Product</center></h4></font></a></div>




    </div>

    <div style="float: left; width: 40%; margin: 30px">
    <form action="insert.php" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Product Id</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="p_id" placeholder="Product Id" required focused/>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Product Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="p_name" placeholder="Product Name" required focused/>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Product Price</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="p_price" placeholder="Product Price" required focused/>
        </div>


        <input type="submit" id="btn-login" href="#" class="btn btn-success btn-block" value="Submit" name="update"/>

        <div style="display:<?php if(!$isUpdated){echo 'none';} ?> ">
            <center> <p><h4><font color="#006400"> Successfully Update</font></h4></p></center>
        </div>
    </form>
        </div>
</div>


</div>

<div class="row">
    <div class="col-md-12" style="background: #0a225e;position: fixed;bottom: 0px;left: 0px;">
        <p style="color: #ffffff">Copyright</p>
    </div>

</div>



</body>
</html>