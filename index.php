<?php
$isUpdated=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $con_error="Sorry, Unable to connect";
    $conn=mysql_connect("localhost","root","") or die($con_error);
    mysql_select_db("pos",$conn) or die($con_error);

    if(isset($_POST["login"])){
        $password=$_POST['password'];
        $username=$_POST["username"];
        $loginQr=mysql_query("select * from user where username='$username' AND password='$password'");
        if($row=mysql_fetch_array($loginQr)){
            header("location:dashboard.php");
        }else{
            echo "Incorrect Username or password";
        }

    }else if(isset($_POST["signup"])){
        $email=$_POST['email'];
        $username=$_POST['username'];
        $f_name=$_POST['firstname'];
        $l_name=$_POST['lastname'];
        $password=$_POST['password'];
        $username=$_POST["username"];
        $email=$_POST['email'];
        $rq=mysql_query("select * from user where username='$username' OR email='$email'");

        if($row=mysql_fetch_array($rq)){
            echo "username is already exist!!";
        }else{

            $rq=mysql_query("INSERT INTO user(email, username, f_name, l_name, password) VALUES ('$email','$username','$f_name','$l_name','$password')");
            if($rq){
                echo "Updated";
                $isUpdated=true;
            }
        }
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
	<div class="row" style="background:#0a225e;margin: 0px;">
		<div class="col-md-3"> 
		</div> 
		<div class="col-md-6">
			
			<h2 style="padding-bottom: 5px"> <font color="#FFFFFF">Point Of Sale </font></h2>
            
			
		</div>
		<div class="col-md-3">

        </div>

	</div>
    <div class="container">

        <div class="container">
            <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Sign In</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
                    </div>

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                        <form id="loginform" class="form-horizontal" action="index.php" method="post" role="form">

                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username or email" required focused />
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input id="login-password" type="password" class="form-control" name="password" placeholder="password"  required focused/>
                            </div>



                            <div class="input-group">
                                <div class="checkbox">
                                    <label>
                                        <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                                    </label>
                                </div>
                            </div>


                            <div style="margin-top:10px" class="form-group">
                                <!-- Button -->

                                <div class="col-sm-12 controls">
                                    <input type="submit" id="btn-login" href="#" class="btn btn-success btn-block" value="login" name="login"/>


                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-12 control">
                                    <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                        Don't have an account!
                                        <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                                            Sign Up Here
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>



                    </div>
                </div>
            </div>
            <div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="panel-title">Sign Up</div>
                        <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Sign In</a></div>
                    </div>
                    <div class="panel-body" >
                        <form id="signupform" class="form-horizontal" role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                            <div id="signupalert" style="display:none" class="alert alert-danger">
                                <p>Error:</p>
                                <span></span>
                            </div>



                            <div class="form-group">
                                <label for="email" class="col-md-3 control-label">Email</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="email" placeholder="Email Address" required focused/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-md-3 control-label">User Nmae</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="username" placeholder="Username" required focused/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="firstname" class="col-md-3 control-label">First Name</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="firstname" placeholder="First Name" required focused/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="lastname" class="col-md-3 control-label">Last Name</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="lastname" placeholder="Last Name" required focused/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-md-3 control-label">Password</label>
                                <div class="col-md-9">
                                    <input type="password" class="form-control" name="password" placeholder="Password" required focused/>
                                </div>
                            </div>



                            <div class="form-group">
                                <!-- Button -->
                                <div class="col-md-offset-3 col-md-9">
                                    <input id="btn-signup" type="submit" class="btn btn-info btn-block" name="signup" value="&nbsp Sign Up"><i class="icon-hand-right"></i>

                                </div>
                            </div>



                        </form>


                        <div style="display:<?php if(!$isUpdated){echo 'none';} ?> ">
                          <center> <p><h4><font color="#006400"> Registration Successful</font></h4></p></center>
                        </div>
                    </div>
                </div>




            </div>
        </div>

    </div>
	<div class="row">
        <div class="col-md-12" style="background: #0a225e;position: fixed;bottom: 0px;left: 0px;">
            <p style="color: #ffffff">Copyright</p>
        </div>
		
	</div>



<script type="text/javascript" src="../pos/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../pos/js/jquery.min.js"></script>
</body>
</html>