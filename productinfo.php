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
    <div class="col-md-3">
        <a href="index.php" class="btn btn-default btn-sm" style="float: right;margin-top: 17px;">Logout</a>
    </div>

</div>
<div class="row" style="margin: 0px">
    <div class="col-md-2" style="background-color: #232324;min-height:570px">
        <div> <a href="dashboard.php"><font color="#f0ffff"><h4><center>Dashboard</center></h4></font></a></div>
        <div> <a href="userinfo.php"><font color="#f0ffff"><h4><center>Users</center></h4></font></a></div>
        <div> <a href="insert.php"><font color="#f0ffff"><h4><center>Insert</center></h4></font></a></div>
        <div> <a href="product.php"><font color="#f0ffff"><h4><center>Product Info</center></h4></font></a></div>


        <div style="float: left; margin: 30px; width: 70% "  >

            <?php
            $con_error="Sorry, Unable to connect";
            $con=mysql_connect("localhost","root","") or die($con_error);
            mysql_select_db("pos",$con) or die($con_error);


            $result = mysql_query("select * from product");

            echo "<table class='table table-hover'>
    <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Price</th>

    </tr>";

            while($row = mysql_fetch_array($result))
            {
                echo "<tr>";
                echo "<td>" . $row['p_id'] . "</td>";
                echo "<td>" . $row['p_name'] . "</td>";
                echo "<td>" . $row['p_price'] . "</td>";

                echo "</tr>";
            }
            echo "</table>";


            ?>
        </div>
    </div>
</div>


</div>

<div class="row">
    <div class="col-md-12" style="background: #0a225e;position: fixed;bottom: 0px;left: 0px;">
        <p style="color: #ffffff">Copyright</p>
    </div>

</div>



</body>