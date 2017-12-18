<?php include 'database.php'; ?>
<?php
	session_start();
	$_SESSION['room_name']="LSPBWO";
	$room_name='LSPBWO';
	$type = 1;
	$query = "SELECT *FROM quizzes WHERE type = $type and room_name = 'LSPBWO' ";
	$result=$mysqli->query($query) or die($mysqli->error._LINE_);
	
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


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
		#first
		{
			float:left;
		}
		#second
		{
			float:right;
			border-radius:25px;
			width:150px;
			height:50px;
			background-color: #ff884d;
			border:2px solid #ff884d;
			margin-right:100px;
			
		}
		
		* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/search_icon.png');
  background-position: 10px 12px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myUL {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

#myUL li a {
  border: 1px solid #ddd;
  margin-top: -1px; /* Prevent double borders */
  background-color: #f6f6f6;
  padding: 12px;
  text-decoration: none;
  font-size: 18px;
  color: black;
  display: block
}

#myUL li a:hover:not(.header) {
  background-color: #eee;
  
}
  .right-inner-addon {
  position: relative;
}

.right-inner-addon input {
  padding-right: 30px;
}

.right-inner-addon i {
  position: absolute;
  right: 0px;
  padding: 10px 12px;
  pointer-events: none;
}
 tr {
    border-bottom: 1px solid #dddddd;
	text-align: left;
	padding: 5px;
}
th,td {
	padding: 15px;
}

	</style>
	
	<script>
function myFunction() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementsByClassName("elements");
	for(j = 0; j < ul.length; j++) {
	td = ul[j].getElementsByClassName("name");
    for (i = 0; i < td.length; i++) {
        if (td[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
            ul[j].style.display = "";
        } else {
            ul[j].style.display = "none";

        }
    }
	}
}
</script>
	
<script>
	function start() {
		var r = confirm("Would you like to start a new activity?");
		if(r == false) {
			
		}
		
	}
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
                <a class="navbar-brand" href="#page-top"><?php echo "LSPBWO";?></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="teacher_homepage.php">LAUNCH</a>
                    </li>
                    <li class="page-scroll">
                        <a href="quizzes.php">QUIZZES</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#contact">	ROOMS</a>
                    </li>
					<li class="page-scroll">
						<a href="excel.php">REPORTS</a>
					</li>
					<li class="page-scroll">
						<a href="results.html">RESULTS</a>
					</li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
	
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
            </div>&nbsp;&nbsp;
			&nbsp;&nbsp;
			&nbsp;&nbsp;
			&nbsp;&nbsp;
			&nbsp;&nbsp;
			&nbsp;&nbsp;
			<h1></h1>
			<h1></h1>
			<h1></h1>
			<h1></h1>
			<h1></h1>
			<h1></h1>
			
			<div>
            <div class="row">
				<br>
				<p id = "first"> <font size = "6"> Quizzes </font></p>
		        <button type="button" id = "second" class="btn btn-success" onclick = "location.href='long_quiz.php';">+Add Quiz</button>
				<br>
				<br>
				<br>
				<br>
				<br>
				
				<div class ="jumbotron container-fluid" >
				<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search Quizzes" title="Type in a name"> 

				</div>
				  <table>
				  <tr>
				  <th style="padding:10px 300px 15px 15px;"> Name </th>
				  <th style="padding:10px 300px 15px 15px;"> Date </th>
				  </tr>
 				  <?php
					$i=1;
				    while($row=$result->fetch_assoc()) {
					?>
					<tr class = "elements">
					<td class = "name" style="padding:10px 300px 15px 15px;" onclick = "start()"> <a href = "results.html" ><u> <?php echo $row['name']; ?> </u></a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  </td> 
					<td style="padding:10px 300px 15px 15px;"> <?php echo $row['Date']; ?> </td>
					</tr>
					
					<?php
					$i=$i+1;
					}
					?>
				  
				 
				</table>
				
                
				</div>
				
            </div>
        </div>
    </section>
	</div>

    
	
    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/freelancer.min.js"></script>

</body>

</html>
