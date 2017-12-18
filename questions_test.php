<?php include 'database.php'; ?>
<?php
	session_start();
	$room_name=$_SESSION['room_name'];
	if (isset($_POST['submit'])){
			$type=$_POST['type'];
			$query = "SELECT *FROM quick_questions where room_name = '$room_name'";
			$questions = $mysqli->query($query);
			$total = $questions->num_rows;
		
			$question_number = $mysqli->real_escape_string($_POST['question_number']);
			$question_text = $mysqli->real_escape_string($_POST['question_text']);
			
			//choices array
			if($type=="mc") {
			$correct_choice = $_POST['correct_choice'];
			 
			$choices = array();
			$choices[1] = $mysqli->real_escape_string($_POST['choice1']);
			$choices[2] = $mysqli->real_escape_string($_POST['choice2']);
			$choices[3] = $mysqli->real_escape_string($_POST['choice3']);
			$choices[4] = $mysqli->real_escape_string($_POST['choice4']);
			//$choices[5] = $_POST['choice5'];
			
			
			//question query
			$query = "INSERT INTO quick_questions (question_number, text,type,room_name)
						VALUES('$question_number','$question_text','$type','$room_name')";
						
				//run query
				
				$insert_row = $mysqli->query($query) or die ($mysqli->error._LINE_);

					// inserting
					
				if($insert_row)
				{
					$query = "INSERT INTO results (question_id,type,room)
						VALUES('$question_number','$type','$room_name')";
				
				$insert_row = $mysqli->query($query) or die ($mysqli->error._LINE_);
					foreach($choices as $choice => $value)
					{
						if($value != '')
						{
							if($correct_choice == $choice)
							{
								$is_correct = 1;
							}
							else
							{
								$is_correct = 0;
							}
							$query = "INSERT INTO quick_choices (question_number,is_correct,text,type,room_name)
										VALUES ('$question_number','$is_correct','$value','$type','$room_name')";
							//run query
							$insert_row = $mysqli->query($query) or die($mysqli->error._LINE_);
							
							if($insert_row)
							{
								continue;
							}else{
								die('Error : ('.$mysqli->errno . ') '. $mysqli->error);
							}
						}
					}
					//$msg = 'Question has been added';
				}
				}
			if($type=="tf") {
			$correct_choice = $_POST['correctchoice'];
			$choices = array();
			$choices[1] = "True";
			$choices[2] = "False";	
			$query = "INSERT INTO quick_questions (question_number, text,type,room_name)
						VALUES('$question_number','$question_text','$type','$room_name')";
				
				$insert_row = $mysqli->query($query);

					// inserting
					
				if($insert_row)
				{
					$query = "INSERT INTO results (question_id,type,room)
						VALUES('$question_number','$type','$room_name')";
						$insert_row = $mysqli->query($query);
					$value="True";
					if($correct_choice==1)
					{
						$is_correct=1;
					}
					else {
						$is_correct=0;
					}
							$query = "INSERT INTO quick_choices (question_number,is_correct,text,type,room_name)
										VALUES ('$question_number','$is_correct','$value','$type','$room_name')";
							//run query
							$insert_row = $mysqli->query($query);
							
							if(!$insert_row){
								die('Error : ('.$mysqli->errno . ') '. $mysqli->error);
							}
						
						
					$value="False";
					if($correct_choice==2)
					{
						$is_correct=1;
					}
					else {
						$is_correct=0;
					}
							$query = "INSERT INTO quick_choices (question_number,is_correct,text,type,room_name)
										VALUES ('$question_number','$is_correct','$value','$type','$room_name')";
							//run query
							$insert_row = $mysqli->query($query);
							
							if(!$insert_row){
								die('Error : ('.$mysqli->errno . ') '. $mysqli->error);
							}
						}
					
					}
				
			}
			
			
		$query = "SELECT *FROM quick_questions";
		$questions = $mysqli->query($query) or die($mysqli->error._LINE_);
		$total = $questions->num_rows;
		$next = $total + 1;
		if($total==5) {
			echo '<script>
					if (confirm("You can enter only a maximum of 5 questions. Click OK to proceed to Results page. Click Cancel to Restart Quiz") == true) {
								window.location="demo2.php";
								} else {
									window.location="delete.php";
								}
				</script>';
				
				$total=0;
				$next=1;
		}
		
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
		#box {
    
    background: #809fff;
	border: 2px solid #002db3;
    padding: 20px;
    width: 50px;
    height: 15px;  
	line-height:3px;
}
		#option {
    
   
    padding: 20px; 
    width: 850px;
    height: 15px;  
	
}
#check1 {
	
	width:25px;
	height:20px;
}
#check2 {
	
	width:25px;
	height:20px;
}
#check3 {
	
	width:25px;
	height:20px;
}
#check4 {
	
	width:25px;
	height:20px;
}
#save{
	width:120px;
}
p.normal{
	font-style: normal;
	font-family: "Times New Roman", Times, serif;
}
#mcq {
	
	border-radius: 25px;
	background-color:white;
    border: 2px solid #007a99;
    padding: 15px; 
    width: 200px;
    height: 50px;
	
}

#tf {
	
	border-radius: 25px;
	background-color:white;
    border: 2px solid #ff0000;
    padding: 15px; 
    width: 200px;
    height: 50px;
	
}
#mc{
	display:none;
}
#trf {
	display:none;
}
#correct {
	display:none;
}
#correct_c {
	display:none;
}
#true 
{
	background-color:#669999;
    border: 2px solid #00004d;
    padding: 15px; 
    width: 200px;
    height: 50px;
	
}
#false{
	background-color:#a3a375;
    border: 2px solid #00004d;
    padding: 15px; 
    width: 200px;
    height: 50px;
	
}
#save_exit {
	background-color:#8cd9b3;
	text-color:white:
}

	</style>
	
<script>
function showDiv() {
   document.getElementById('options').style.display = "none";
   document.getElementById('mc').style.display = "block";
   
}
function showDiv1() {
   document.getElementById('options').style.display = "none";
   document.getElementById('trf').style.display = "block";
   
}
function correct_ans() {
	
							if(document.getElementById('check1').checked) {
								document.getElementById('correct').value=1;
							}
							else if(document.getElementById('check2').checked) {
								document.getElementById('correct').value=2;
							}
							else if(document.getElementById('check3').checked) {
								document.getElementById('correct').value=3;
							}
							else if(document.getElementById('check4').checked) {
								document.getElementById('correct').value=4;
							}
						
}
function fun_true() {
   document.getElementById('correct_c').value=1;
   
}

function fun_false() {
  document.getElementById('correct_c').value=2;
   
}
function Save_exit() {
	<?php 
		$query = "SELECT *FROM current_activity where room_name = '$room_name'";
		$result = $mysqli->query($query);
		if($result) {
			$query = "UPDATE current_activity SET type = '0' , test_name = 'quick_quiz' WHERE room_name = '$room_name'";
			$result = $mysqli->query($query);
		}
		else {
			$query = "INSERT INTO current_activity (room_name , test_name, type) VALUES ('$room_name','quick_quiz','0')";
			$result = $mysqli->query($query);
		}
		
	?>
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
                <a class="navbar-brand" href="#page-top"><?php echo $_SESSION['room_name']; ?></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
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
					</li> 
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
			<!--	<div class = "container"> -->
					&nbsp;&nbsp;
					&nbsp;&nbsp; 
					<h3>Create Quiz<h3>
					<form action="demo2.php">
						<input id="save_exit" type="submit" value="Save and Exit" class="btn btn-outline-primary" style="float:right" onclick = "Save_exit()"/>
					</form>
					<br>
					<div id="options">
					<p class="normal">
						QUESTIONS
					</p>
					
					<button id="mcq" type="button" class="btn btn-outline-primary" onclick="showDiv()">+ Multiple Choice</button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<button id="tf" type="button" class="btn btn-outline-primary" onclick="showDiv1()">+ True or False</button>
					
					</div>
					<br>
					
					<div id="mc" class="jumbotron">
					<form method="post" action="">
					
					<p>
					<input type="hidden" value="mc" name="type" />
					<input type="hidden" value="<?php echo $next; ?>" name="question_number" />
					<input id="correct" type="number" name="correct_choice" />
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					
							<input  id="save" type="submit" name="submit" value="Save"  class="btn btn-success"/ >
						</p>
						
						<p>
						#<?php echo $next; ?>
												
							&nbsp;&nbsp;
							&nbsp;&nbsp;
							<input id="option"type="text" name="question_text" size=100 />
						</p>
						
						<p>				
							Answer Choice
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							Correct?
						</p>	
							
							<p> 
								<label id="box">A</label>
						&nbsp;&nbsp;
								<input id="option" type="text" name="choice1" size=60 />
								&nbsp;&nbsp;&nbsp;
								<label><input id="check1" onclick="correct_ans()" type="checkbox" value=""></label>
								
							<!--</div>-->
							<br>
							
						
						</p>
						
						<p> 
								<label id="box">B</label>
						&nbsp;&nbsp;
								<input id="option" type="text" name="choice2" size=60 />
								&nbsp;&nbsp;&nbsp;
								<label><input id="check2"onclick="correct_ans()" type="checkbox" value=""></label>
							
							<br>
						</p>
						
						<p> <label id="box">C</label>
						&nbsp;&nbsp;
								<input id="option" type="text" name="choice3" size=60 />
								&nbsp;&nbsp;&nbsp;
								<label><input id="check3" onclick="correct_ans()" type="checkbox" value=""></label>
							
							<br>
						</p>
						
						<p>
						
								<label id="box">D</label>
						&nbsp;&nbsp;
								<input id="option" type="text" name="choice4" size=60 />
								&nbsp;&nbsp;&nbsp;
								<label><input id="check4" onclick="correct_ans()"type="checkbox" value=""></label>
							
							<br>
						</p>
						
						
							
					</form>
					</div>
					<br>
					<div class="jumbotron" id="trf">
					<form method="post" action="">
					
					<p>
					<input type="hidden" value="tf" name="type" />
					<input id="correct_c" type="number" name="correctchoice" />
					<input type="hidden" value="<?php echo $next; ?>" name="question_number" />
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;
							<input  id="save" type="submit" name="submit" value="Save"  class="btn btn-success"/ >
						</p>
						
						<p>
						
						#<?php echo $next; ?>
							&nbsp;&nbsp;
							&nbsp;&nbsp;
											
							<input id="option"type="text" name="question_text" size=100 />
							
						</p>
						
						<p>
							Correct Answer:
						</p>
						</form>
						<p>
						<button id="true" type="button" class="btn btn-outline-primary" onclick="fun_true()">True</button>
						<button id="false" type="button" class="btn btn-outline-primary" onclick="fun_false()">False</button>
						</p>
				
					</div>
					
			<!--	</div> -->

			</main>
        </div>
    </section>

