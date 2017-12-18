<?php
	session_start();
	//$db = mysqli_connect("localhost","root", "root","logintest1");
	define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASSWORD", "quizzer");
    define("DB_DATABASE", "logintest");

   // $db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
      $db = mysqli_connect("localhost", "root", "", "logintest");

	
	if (isset($_POST['register-submit'])) {
		//session_start();
		$username = mysqli_real_escape_string($db,$_POST['username']);
		$email = mysqli_real_escape_string($db,$_POST['email']);
		$password = mysqli_real_escape_string($db,$_POST['password']);
		$password2 = mysqli_real_escape_string($db,$_POST['confirm-password']);
		$room_name = mysqli_real_escape_string($db,$_POST['room_name']);
		if ($password == $password2)
		{
			$password = md5($password);
			$sql = "INSERT INTO try(username,email,password,room_name) VALUES('$username','$email','$password','$room_name')";
			mysqli_query($db, $sql);
		   // $_SESSION['message'] = "You are now logged in";
			//$_SESSION['room_name']=$room_name;
			$_SESSION['username'] = $username;
			header("location: teacher_login.php");
		}else
		{
		    $_SESSION['message'] = "The two passwords do not match";
		}
	}
	if (isset($_POST['login-submit'])) {
		//session_start();
		$username = mysqli_real_escape_string($db,$_POST['username']);
		//$email = mysqli_real_escape_string($db,$_POST['email']);
		$password = mysqli_real_escape_string($db,$_POST['password']);
		//$password2 = mysqli_real_escape_string($db,$_POST['password2']);
		$password = md5($password);
		$sql = "SELECT * FROM try WHERE username = '$username' AND password ='$password' ";
		$result = mysqli_query( $db, $sql);
		$data= $result->fetch_assoc();
		
		
		if (mysqli_num_rows($result) == 1)
		{
			
			$_SESSION['room_name']=$data['room_name'];
			$_SESSION['message'] = "You are now logged in";
			$_SESSION['username'] = $username;
			header("location: teacher_homepage.php");
	
	//		$sql = "INSERT INTO users(username,email,password) VALUES('$username','$email','$password')";
		//	header("location: home.php");
		}else
		{
			//echo "incorrect password";
		   $_SESSION['message'] = "Username/Password is incorrect";
		}
	}
		
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="css1/style.css">
  <!--<link rel="stylesheet" href="css3/style2.css" >-->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PROJECT</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/freelancer.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
  </head>
<body id="page-top" class="index">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.php">QUIZ ROOM</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="#portfolio"><strong>TEACHER</strong></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
	</nav>  
  
<h1> </h1> 
<h1> </h1>
<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Login</a>
						<!--<a href ="#" class="btn btn-success btn-lg" role="button"><span class="glyphicon glyphicon-log-in"> </span>LOGIN</a> -->
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
							
							<!--	<form id="login-form" action="http://phpoll.com/login/process" method="post" role="form" style="display: block;"> -->
									<form id="login-form" action="#" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group text-center">
										<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
										<label for="remember"> Remember Me</label>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<!--<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">-->
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-primary" value="Log In">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<a href="http://phpoll.com/recover" tabindex="5" class="forgot-password">Forgot Password?</a>
												</div>
											</div>
										</div>
									</div>
								</form>
								
								<!--<form id="register-form" action="http://phpoll.com/register/process" method="post" role="form" style="display: none;">-->
									<form id="register-form" action="#" method="post" role="form" style="display: none;">
									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
									</div>
									<div class="form-group">
										<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="1" class="form-control" placeholder="Password">
									</div>
									<div class="form-group">
										<input type="password" name="confirm-password" id="confirm-password" tabindex="1" class="form-control" placeholder="Confirm Password">
									</div>
									<div class="form-group">
										<input type="room_name" name="room_name" id="room_name" tabindex="1" class="form-control" placeholder="Enter Room Name">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<!--<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">-->
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-primary" value="Register Now">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="js/script.js"></script>
	</body>
	</html>