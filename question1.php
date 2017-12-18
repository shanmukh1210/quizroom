<?php include 'database.php'; ?>
<?php session_start() ; ?>
<?php
  // set question number
	$number = (int)$_GET['n'];
	$room_name = $_SESSION['room_name'];
	
	$query  = "SELECT * FROM quick_questions WHERE room_name = '$room_name'";
	$result = $mysqli->query($query) or die($mysqli->error._LINE);
	$total = $result->num_rows;
	$question = $result->fetch_assoc();
	
	$query = "SELECT * FROM quick_choices WHERE question_number = $number and room_name = '$room_name'";
	$result=$mysqli->query($query) or die($mysqli->error._LINE_);
	
	
	
	$choices = $mysqli->query($query) or die($mysqli->error._LINE_);
	
	
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
		
		.btn-primary{
			background-color: #5c8a8a;
		}
	</style>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script>
		function Answer(m) {
		document.getElementById('correct').value = m;
		
}

			</script>
			<script>
					 $(document).ready(function() {
       $('.disableEvent').bind('cut copy paste', function (e) {
        e.preventDefault();
		alert("Menu Disabled");
    });
    });
			</script>
			
		<script>	
			 $(document).ready(function() {
        $(".disableEvent").on("contextmenu",function(){
             alert('right click disabled');
           return false;
        }); 
    });
          </script>
		  <script>
				document.onkeydown = function(e) { if (e.ctrlKey && (e.keyCode === 67 || e.keyCode === 86 || e.keyCode === 85 || e.keyCode === 117 || e.keyCode === 70 || e.keyCode === 83)) { alert('Menu Disabled'); return false; } else { return true; } };
						
		  </script>
		  
	

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
                <a class="navbar-brand" href="#page-top">QUIZROOM</a>
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
						<a href="#contact"></a>
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
	 <div class="container">
	  <div class="container">
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
			<main>
				<div class ="container">
					<div class="current"><p><?php echo $question['question_number']; ?> of <?php echo $total; ?></p></div> 
					&nbsp;&nbsp;
					&nbsp;&nbsp
					&nbsp;&nbsp;
					<div class="disableEvent">
					<p class = "question">
					 <?php echo $question['text']; ?> 
					</p> 
					&nbsp;&nbsp;
					<form method="post" action="process1.php">
						<div class="choices">
							<?php
							$i=1;
						    while($row=$choices->fetch_assoc()) {
								?>
								<p>
								
								<input type="button" class="btn btn-circle btn-primary" onclick="Answer(<?php echo $i-1; ?>);" value = "<?php echo $i; ?>" />&nbsp;&nbsp;&nbsp;&nbsp;
								
								<?php echo $row['text']; ?>
								
								</p>
								<br>
								
								
							<?php
							$i=$i+1;
							}
							?>
							<input type="hidden" id="correct" name="choice">
							</div>
						<br>
					
						<input id = "submit_button" type="submit" value="Submit Answer" />
						<input type="hidden"  name="number" value="<?php echo $number; ?> " />
					</form>
					</div>
					</div>
			</main>
			</div>			
			</div>
			</section>
			</div>
			</div>