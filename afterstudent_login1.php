
<?php
	session_start();
	define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASSWORD", "quizzer");
    define("DB_DATABASE", "logintest");

   // $db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
      $db = mysqli_connect("localhost", "root", "quizzer", "logintest");

	
	if (isset($_POST['JOIN'])) {
		//session_start();
		$roomname = mysqli_real_escape_string($db,$_POST['Roomname']);
		$name = mysqli_real_escape_string($db,$_POST['Name']);
		$status=1;
		$sql = "SELECT * FROM try WHERE room_name = '$roomname'";
		$result = mysqli_query( $db, $sql);
		if (mysqli_num_rows($result) == 1)
		{
			$_SESSION['room_name']=$roomname;
			$_SESSION['message'] = "You are now logged in";
			$_SESSION['name'] = $name;
			$dbs = mysqli_connect("localhost", "root", "quizzer", "quizzer");
			$sql = "SELECT * FROM current_activity WHERE room_name = '$roomname'";
			$result = mysqli_query( $dbs, $sql);
			$row = $result->fetch_assoc();
			if($name!=""){
			if($row['type']==1) {
			$query = "INSERT INTO lspbwo_try (name) VALUES ('$name')";
			$result = mysqli_query( $dbs, $query);
			//if($result) {
			$_SESSION['count']=1;
			$_SESSION['i']=0;
			$_SESSION['j']=0;
			$_SESSION['k']=0;
			$_SESSION['p'] = 0;
			$_SESSION['q'] = 0;
			$_SESSION['level']=2;
			$_SESSION['correctper'] = 0;
			$_SESSION['correct'] = 0;
			$_SESSION['attempted'] = 0;
			$_SESSION['check'] = array(0,0,0,0,0);
			header("location: Level.php");
		//}
			}
			else {
				header("location: index2.php");
			}
			}
			else {
				echo "Please enter your name!";
			}
	
	//		$sql = "INSERT INTO users(username,email,password) VALUES('$username','$email','$password')";
		//	header("location: home.php");
		}else
		{
			//echo "";
		    //$_SESSION['message'] = "Roomname is incorrect";
		}
		
		
		
	}
	
	
		
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet"  href="css/style1.css">
	<title>QUIZ ROOM</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
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
	
	
	<style>
input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}
.container_inside{
		margin: auto;
		width: 60%;
		<!--border: 3px solid #73AD21;-->
		border: 3px solid #003366;
		padding: 10px;
}

</style>
  
</head>
<!--<h1 class="primary"><center>QUIZ ROOM</center></h1>-->
<body id="page-top" class="index">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#">QUIZ ROOM</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="#portfolio"><strong>STUDENT LOGIN</strong></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
	</nav>
	 <section id="portfolio">
        <div class="container">
			
	<body>


<div>
	<h1> </h1>
  <h1> </h1>
   &nbsp;&nbsp;
   <div class="container_inside">
  <form action="#" method="post">
  
  
    <label for="lname">Room Name</label>
    <input type="text" id="Roomname" name="Roomname" placeholder="">

    <label for="lname">Name</label>
    <input type="text" id="Name" name="Name" placeholder="">

    
  
    <input type="submit" name="JOIN" id="JOIN">
  </form>
  </div>
</div>
        </div>
    </section>
	
</section>
</body>
</html>


















































