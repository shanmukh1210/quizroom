<?php include 'database.php'; ?>
<?php include 'variables.php'; ?>

<?php
	$room_name = $_SESSION['room_name'];
	$query = "SELECT * FROM current_activity WHERE room_name = '$room_name'";
	$result = $mysqli->query($query) or die($mysqli->error._LINE);
	$row = $result->fetch_assoc();
	$test_name = $row['test_name'];
    $query = "SELECT * FROM questions WHERE LEVEL = 1 and test_name='$test_name' and room_name = '$room_name'";
	$result=$mysqli->query($query) or die($mysqli->error._LINE_);
	$_SESSION['eas']=$result->num_rows;
	while($row=$result->fetch_assoc())
	{
		
		$_SESSION['easy'][] = $row; 
	}
	
	$query = "SELECT * FROM questions WHERE Level=0 and test_name='$test_name' and room_name = '$room_name'";
	$result=$mysqli->query($query) or die($mysqli->error._LINE_);
	$_SESSION['beg']=$result->num_rows;
	while($row=$result->fetch_assoc())
	{
		
		$_SESSION['beginner'][] = $row; 
	}
	$query = "SELECT * FROM questions WHERE Level=2 and test_name='$test_name' and room_name = '$room_name'";
	$result=$mysqli->query($query) or die($mysqli->error._LINE_);
	$_SESSION['med']=$result->num_rows;
	while($row=$result->fetch_assoc())
	{
		
		$_SESSION['medium'][] = $row; 
	}
	
	$query = "SELECT * FROM questions WHERE Level=3 and test_name='$test_name' and room_name = '$room_name'";
	$result=$mysqli->query($query) or die($mysqli->error._LINE_);
	$_SESSION['har']=$result->num_rows;
	while($row=$result->fetch_assoc())
	{
		
		$_SESSION['hard'][] = $row; 
	}
	$query = "SELECT * FROM questions WHERE Level=4 and test_name='$test_name' and room_name = '$room_name'";
	$result=$mysqli->query($query) or die($mysqli->error._LINE_);
	$_SESSION['vhar']=$result->num_rows;
	while($row=$result->fetch_assoc())
	{
		
		$_SESSION['veryhard'][] = $row; 
	}
	
	$total = $_SESSION['beg'] + $_SESSION['eas'] + $_SESSION['med'] + $_SESSION['har'] + $_SESSION['vhar'];
	
	
	if($_SESSION['count']>$total)
	{
		if($_POST)
		{
		$answer=$_POST['choice'];
		}
		$prev=$_SESSION['prev'];
		 // $query = "SELECT * FROM choices
		//			WHERE question_number = $prev";
	
	
	
	
	    //$choices = $mysqli->query($query) or die($mysqli->error._LINE_);
		//$con =0;
		//while($row=$choices->fetch_assoc())
		//{
			//$con=$con+1;
			//if($row['is_correct']==1)
			//{
				//break;
			//}
		//}
		$query = "SELECT * FROM questions WHERE question_number = $prev and test_name='$test_name' and room_name = '$room_name'";
		$choices = $mysqli->query($query) or die($mysqli->error._LINE_);
		$row = $choices->fetch_assoc();
		$con = $row['answer'];
		$array_split = explode(",",$con);
		asort($array_split);
		$con= implode(',', $array_split);
		if($answer==$con)
		{
			$_SESSION['score']=$_SESSION['score']+$_SESSION['level']+1;
		}
		$_SESSION['count']=1;
		$_SESSION['i']=0;
		$_SESSION['j']=0;
		$_SESSION['k']=0;
		$_SESSION['p'] = 0;
		$_SESSION['q'] = 0;
		$_SESSION['level']=1;
		$_SESSION['correctper'] = 0;
		$_SESSION['correct'] = 0;
		$_SESSION['attempted'] = 0;
		$_SESSION['check'] = array(0,0,0,0,0);
		header("Location: endpage.php");
		
	}
	
    
	
   
	if($_SESSION['count']==2)
	{
        $j=$_SESSION['j'];
		$question=$_SESSION['medium'][$j];
		
		//$_SESSION['j']=$_SESSION['j']+1;
		$_SESSION['i']=0;
		$_SESSION['j']=0;
		$_SESSION['k']=0;
		$_SESSION['p'] = 0;
		$_SESSION['q'] = 0;
		$_SESSION['attempted'] = 1;
		$_SESSION['correct'] = 0;
		$_SESSION['correctper'] = 0;
		$_SESSION['check'] = array(0,0,0,0,0);
		$_SESSION['level'] = 2;
				
	}
	else
	{
		
	    if($_POST)
		{
		$answer=$_POST['choice'];
		}
		$prev=$_SESSION['prev'];
	
	
	
	
	   
		$query = "SELECT * FROM questions WHERE question_number = $prev and test_name='test_quiz' and room_name = '$room_name'";
		$choices = $mysqli->query($query) or die($mysqli->error._LINE_);
		$row = $choices->fetch_assoc();
		$con = $row['answer'];
		$array_split = explode(",",$con);
		asort($array_split);
		$con= implode(',', $array_split);
		$column = (string)$prev;
		$query = "UPDATE lspbwo_try SET `$prev` ='$con' WHERE name='shan'";
		$mysqli->query($query) or die($mysqli->error._LINE_);
		if($answer==$con)
		{
			$_SESSION['correct'] = $_SESSION['correct'] + 1;
			$_SESSION['correctper'] = ($_SESSION['correct'] * 1.0 )/ $_SESSION['attempted'];
			$x = $_SESSION['correctper'];
			//echo "<script> alert('$x'); </script>" ;
			$_SESSION['score']=$_SESSION['score']+$_SESSION['level']+1;
			if($_SESSION['correctper'] >= 0.5) {
			$_SESSION['level'] = $_SESSION['level']+1; 
			}
			if($_SESSION['level']>4)
			{
				$_SESSION['level']=4;
			}
			$flag = 0;
			for($c = $_SESSION['level']; $c <= 4; $c++) {
				if($_SESSION['check'][$c] == 0) {
				$_SESSION['level'] = $c;
				$flag = 1;
				break;
				}
			}
			if($flag == 0) {
				for($c = $_SESSION['level']-1 ; $c >= 0; $c--) {
					if($_SESSION['check'][$c] == 0) {
						$_SESSION['level'] = $c;
						$flag = 1;
						break;
					}
				}
			}
			if($flag == 0) {
				header("Location: endpage.php");
				
			}
			
			
		}
			
		
		else
		{
			$_SESSION['correctper'] = ($_SESSION['correct'] * 1.0 )/ $_SESSION['attempted'];
			$x = $_SESSION['correctper'];
			//echo "<script> alert('$x'); </script>" ;
			if($_SESSION['correctper'] < 0.5) {
			$_SESSION['level']=$_SESSION['level']-1; 
			}
			if($_SESSION['level']<0)
			{
				$_SESSION['level']=0;
			}
			
			$flag = 0;
			for($c = $_SESSION['level']; $c >= 0; $c--) {
				if($_SESSION['check'][$c] == 0) {
				$flag = 1;
				$_SESSION['level'] = $c;
				break;
				}
			}
			if($flag == 0) {
				for($c = $_SESSION['level']+1 ; $c <= 4; $c++) {
					if($_SESSION['check'][$c] == 0) {
						$_SESSION['level'] = $c;
						$flag = 1;
						break;
					}
				}
			}
			if($flag == 0) {
				header("Location: endpage.php");
				
			}
					
			
		}
			$_SESSION['attempted'] = $_SESSION['attempted'] + 1;
		}
		$level=$_SESSION['level'];
		if($level==1)
		{
			$m=$_SESSION['i'];
			$question=$_SESSION['easy'][$m];
			$_SESSION['i']=$_SESSION['i']+1;
			if($_SESSION['i'] == $_SESSION['eas']) {
				$_SESSION['check'][1] = 1;
			}
			
		}
		else if($level==2)
		{
			$m=$_SESSION['j'];
			$question=$_SESSION['medium'][$m];
			$_SESSION['j']=$_SESSION['j']+1;
			if($_SESSION['j'] == $_SESSION['med']) {
				$_SESSION['check'][2] = 1;
			}
		}
		else if($level == 3)
		{
			$m=$_SESSION['k'];
			$question=$_SESSION['hard'][$m];
			$_SESSION['k']=$_SESSION['k']+1;
			if($_SESSION['k'] == $_SESSION['har']) {
				$_SESSION['check'][3] = 1;
			}
		}
		
		else if($level == 0)
		{
			$m=$_SESSION['p'];
			$question=$_SESSION['beginner'][$m];
			$_SESSION['p']=$_SESSION['p']+1;
			if($_SESSION['p'] == $_SESSION['beg']) {
				$_SESSION['check'][0] = 1;
			}
		}
		
		
		
		
		
	
		
	 $_SESSION['prev']=$question['question_number'];
	 $_SESSION['count']=$_SESSION['count']+1;
	 $num=$question['question_number'];
     $query = "SELECT * FROM choices
					WHERE question_number = $num and test_name='$test_name' and room_name = '$room_name'";
	
	
	
	
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
		
		.btn-circle{
			background-color:#6699cc;
			border-color:#000033;
		}
		.bgm {
			background-color:#009999;
		}
	</style>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script>
		function Answer(m,bg,id) {
		$(bg).toggleClass('bgm');
		if(bg.className == "btn btn-circle bgm") {
			if( document.getElementById('correct').value == "begin") {
			document.getElementById('correct').value = bg.value;
			}
			else {
				document.getElementById('correct').value = document.getElementById('correct').value + "," +bg.value;
			}
			//alert(document.getElementById('correct').value);
		}
		if(bg.className == "btn btn-circle") {
			var str1 = document.getElementById('correct').value;
			if(str1.length == 1) {
				var str = bg.value;
				var replace = "begin";
			}
			else {
				var str = "," + bg.value;
				replace = '';
			}
			document.getElementById('correct').value = str1.replace(str,replace);
			//alert(document.getElementById('correct').value);
		}
		
		
		
   
   
   
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
				<a class="navbar-brand" style="visibility: hidden" href="#page-top">Quiz</a>
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
					<div class="current"><p><?php echo $_SESSION['count']-1 ?> of <?php echo $total; ?></p></div> 
					&nbsp;&nbsp;
					&nbsp;&nbsp
					&nbsp;&nbsp;
					<div class="disableEvent">
					<p class = "question">
					 <?php echo $question['text']; ?> 
					</p> 
					&nbsp;&nbsp;
					<form method="post" action="level.php">
						<div class="choices">
							<?php
							$i=1;
						    while($row=$choices->fetch_assoc()) {
								?>
								<p>
								
								<input type="button" class="btn btn-circle" onclick="Answer(<?php echo $i; ?>,this,this.className);" value = "<?php echo chr(ord('A') + $i-1); ?>" />&nbsp;&nbsp;&nbsp;&nbsp;
								
								<?php echo $row['text']; ?>
								
								</p>
								
								<br>
								
								
							<?php
							$i=$i+1;
							}
							?>
							<input type="hidden" id="correct" name="choice" value="begin">
							</div>
						<br>
						<input id = "submit_button" type="submit" value="Submit Answer" />
					</form>
					</div>
					</div>
			</main>
			</div>			
			</div>
			</section>
			</div>
			</div>