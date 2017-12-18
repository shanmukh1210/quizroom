<?php include 'database.php'; ?>
<?php
session_start();
$room_name = $_SESSION['room_name'];
$query = "SELECT * FROM quick_questions WHERE room_name = '$room_name'";
$results = $mysqli->query($query) or die($mysqli->error._LINE_);

$total = $results->num_rows;



$score=0;
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Question Page</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/freelancer.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<style>
		.jumbotron {
margin-bottom: 0px;
border: 2px;
border-style:solid;
border-color: black;
}
	</style>

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
                <!--<a class="navbar-brand" href="#page-top"></a> -->
				
				<!--<div id="divCheckbox" style="visibility: hidden"> -->
				<a class="navbar-brand" href="#page-top">QuizRoom</></a>
				<a class="navbar-brand" style="visibility: hidden" href="#page-top">QuizRoom</a>
				<a class="navbar-brand" style="visibility: hidden" href="#page-top">QuizRoom</a>
				<a class="navbar-brand" style="visibility: hidden" href="#page-top">QuizRoom</a>
				<a class="navbar-brand" style="visibility: hidden" href="#page-top">QuizRoom</a>
				<a class="navbar-brand" style="visibility: hidden" href="#page-top">Q</a>
				<a class="navbar-brand" href="#page-top"><?php echo $_SESSION['room_name']; ?></a>
				
				</div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                   <!-- <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="#portfolio">LAUNCH</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#about">QUIZZES</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#contact">	ROOMS</a>
                    </li>
					<li class="page-scroll">
						<a href="#contact">REPORTS</a>
					</li>
					<li class="page-scroll">
						<a href="#contact">RESULTS</a>
					</li> -->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <!--<header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <img class="img-responsive" src="img/profile.png" alt="">
                    <div class="intro-text">
                        <span class="name">Start Bootstrap</span>
                        <hr class="star-light">
                        <span class="skills">Web Developer - Graphic Artist - User Experience Designer</span>
                    </div>
                </div>
            </div>
        </div>
    </header> -->

    <!-- Portfolio Grid Section -->
	&nbsp;&nbsp;
	&nbsp;&nbsp;
	&nbsp;&nbsp;
	<div class= "container" >
	<div class= "container" >
	<div class= "container" >
	<div class= "container" >
    <section id="portfolio">
        <div class="container">
            <div class="row">
               <!-- <div class="col-lg-12 text-center">
                    <h2>Portfolio</h2>
                    <hr class="star-primary">
                </div>-->
				<h2></h2>
				&nbsp;&nbsp;
            </div>
			
			<div class="row">
			
			<main>
				<div class ="container">
					<!--<h3>Test your knowledge</h3> -->
					<!--<p> This is a mcq's quiz </p> -->
					&nbsp;&nbsp;
					<div class="jumbotron">
					   <h3>Test your knowledge </h3>
					<ul>
						<li><p><strong>Number of Questions: </strong> <?php echo $total; ?></p></li>
						<li><p><strong>Type: </strong>Multiple Choice  and  True/False <p></li>
						<!--<li><strong> Estimated Time: </strong> <?php echo $total * 1; ?> Minutes </li> -->
					</ul>
					
					<a href="question1.php?n=1" class="start"><button type="button" class="btn btn-success">Start Quiz</button></a> 
					</div>
				</div>
			</main>
		      </div>
		</div>
		</div>
		</div>
		</div>
		
			 </body>
			 </html>