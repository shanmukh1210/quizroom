<?php
	session_start();
	$room_name = $_SESSION['room_name'];
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
 <style>
div.jumbotron {
	width:50%;

}
div.myProgress {
 width: 50%;
 height:40px;
 background-color:#bf4080;
margin-left:70px;

}

div.myBar {
  width: 1%;
  height: 40px;
  background-color: #3333cc;
  text-align:right;
  color:black;
 }
#button1{
width:40px;
height:40px;
border:blue;
background:#3333cc;
color:black;
margin-left:20px;
}

#button2{
width:40px;
height:40px;
border:blue;
background:#3333cc;
color:black;
margin-left:20px;
}
#button3{
width:40px;
height:40px;
border:blue;
background:#3333cc;
color:black;
margin-left:20px;
}
 
 #button4{
width:40px;
height:40px;
border:blue;
background:#3333cc;
color:black;
margin-left:20px;
}

#button5{
width:40px;
height:40px;
border:blue;
background:#3333cc;
color:black;
margin-left:20px;
}

#button6{
width:40px;
height:40px;
border:blue;
background:#3333cc;
color:black;
margin-left:20px;
}
#para1 {
	margin-left:5px;
}
#para {
	margin-left:5px;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script>
function check() {
		
        $.ajax({url: "http://localhost/chartjs/data.php", method: "GET", data: {question:1}, success: function(result){
            if(result['type']=="mc") {
			$("#mcqs").css("display" , "block");
			$("#btn1").replaceWith($("#mcqs"));
			$("#para").html("#1");
			$("#first_bar").css("width" , ((result['count_1']*100)/result['student_count'])+'%');
			$("#first_bar").html(Math.round((result['count_1']*100)/result['student_count'])+'%');
			$("#second_bar").css("width" , ((result['count_2']*100)/result['student_count'])+'%');
			$("#second_bar").html(Math.round((result['count_2']*100)/result['student_count'])+'%');
			$("#third_bar").css("width" , ((result['count_3']*100)/result['student_count'])+'%');
			$("#third_bar").html(Math.round((result['count_3']*100)/result['student_count'])+'%');
			$("#fourth_bar").css("width" , ((result['count_4']*100)/result['student_count'])+'%');
			$("#fourth_bar").html(Math.round((result['count_4']*100)/result['student_count'])+'%');
			}
        
		
		if(result['type']=="tf") {
			$("#tfs").css("display" , "block");
			$("#btn1").replaceWith($("#tfs"));
			$("#para1").html("#1");
			$("#first_bar1").css("width" , ((result['count_1']*100)/result['student_count'])+'%');
			$("#first_bar1").html(Math.round((result['count_1']*100)/result['student_count'])+'%');
			$("#second_bar1").css("width" , ((result['count_2']*100)/result['student_count'])+'%');
			$("#second_bar1").html(Math.round((result['count_2']*100)/result['student_count'])+'%');
			
			}
        
		}
		});
  setInterval(check,30000);  
}

function check1() {
		
        $.ajax({url: "http://localhost/chartjs/data.php", method: "GET", data: {question:2}, success: function(result){
            if(result['type']=="mc") {
			$("#mcqs").css("display" , "block");
			$("#btn2").replaceWith($("#mcqs"));
			$("#para").html("#2");
			$("#first_bar").css("width" , ((result['count_1']*100)/result['student_count'])+'%');
			$("#first_bar").html(Math.round((result['count_1']*100)/result['student_count'])+'%');
			$("#second_bar").css("width" , ((result['count_2']*100)/result['student_count'])+'%');
			$("#second_bar").html(Math.round((result['count_2']*100)/result['student_count'])+'%');
			$("#third_bar").css("width" , ((result['count_3']*100)/result['student_count'])+'%');
			$("#third_bar").html(Math.round((result['count_3']*100)/result['student_count'])+'%');
			$("#fourth_bar").css("width" , ((result['count_4']*100)/result['student_count'])+'%');
			$("#fourth_bar").html(Math.round((result['count_4']*100)/result['student_count'])+'%');
			}
        
		
		if(result['type']=="tf") {
			$("#tfs").css("display" , "block");
			$("#btn2").replaceWith($("#tfs"));
			$("#para1").html("#2");
			$("#first_bar1").css("width" , ((result['count_1']*100)/result['student_count'])+'%');
			$("#first_bar1").html(Math.round((result['count_1']*100)/result['student_count'])+'%');
			$("#second_bar1").css("width" , ((result['count_2']*100)/result['student_count'])+'%');
			$("#second_bar1").html(Math.round((result['count_2']*100)/result['student_count'])+'%');
			
			}
        
		}
		});
  setInterval(check1,30000);  
}

function check2() {
		
        $.ajax({url: "http://localhost/chartjs/data.php", method: "GET", data: {question:3}, success: function(result){
            if(result['type']=="mc") {
			$("#mcqs").css("display" , "block");
			$("#btn3").replaceWith($("#mcqs"));
			$("#para").html("#3");
			$("#first_bar").css("width" , ((result['count_1']*100)/result['student_count'])+'%');
			$("#first_bar").html(Math.round((result['count_1']*100)/result['student_count'])+'%');
			$("#second_bar").css("width" , ((result['count_2']*100)/result['student_count'])+'%');
			$("#second_bar").html(Math.round((result['count_2']*100)/result['student_count'])+'%');
			$("#third_bar").css("width" , ((result['count_3']*100)/result['student_count'])+'%');
			$("#third_bar").html(Math.round((result['count_3']*100)/result['student_count'])+'%');
			$("#fourth_bar").css("width" , ((result['count_4']*100)/result['student_count'])+'%');
			$("#fourth_bar").html(Math.round((result['count_4']*100)/result['student_count'])+'%');
			}
        
		
		if(result['type']=="tf") {
			$("#tfs").css("display" , "block");
			$("#btn3").replaceWith($("#tfs"));
			$("#para1").html("#3");
			$("#first_bar1").css("width" , ((result['count_1']*100)/result['student_count'])+'%');
			$("#first_bar1").html(Math.round((result['count_1']*100)/result['student_count'])+'%');
			$("#second_bar1").css("width" , ((result['count_2']*100)/result['student_count'])+'%');
			$("#second_bar1").html(Math.round((result['count_2']*100)/result['student_count'])+'%');
			
			}
        
		}
		});
  setInterval(check2,30000);  
}

function check3() {
		
        $.ajax({url: "http://localhost/chartjs/data.php", method: "GET", data: {question:4}, success: function(result){
            if(result['type']=="mc") {
			$("#mcqs").css("display" , "block");
			$("#btn4").replaceWith($("#mcqs"));
			$("#para").html("#4");
			$("#first_bar").css("width" , ((result['count_1']*100)/result['student_count'])+'%');
			$("#first_bar").html(Math.round((result['count_1']*100)/result['student_count'])+'%');
			$("#second_bar").css("width" , ((result['count_2']*100)/result['student_count'])+'%');
			$("#second_bar").html(Math.round((result['count_2']*100)/result['student_count'])+'%');
			$("#third_bar").css("width" , ((result['count_3']*100)/result['student_count'])+'%');
			$("#third_bar").html(Math.round((result['count_3']*100)/result['student_count'])+'%');
			$("#fourth_bar").css("width" , ((result['count_4']*100)/result['student_count'])+'%');
			$("#fourth_bar").html(Math.round((result['count_4']*100)/result['student_count'])+'%');
			}
        
		
		if(result['type']=="tf") {
			$("#tfs").css("display" , "block");
			$("#btn4").replaceWith($("#tfs"));
			$("#para1").html("#4");
			$("#first_bar1").css("width" , ((result['count_1']*100)/result['student_count'])+'%');
			$("#first_bar1").html(Math.round((result['count_1']*100)/result['student_count'])+'%');
			$("#second_bar1").css("width" , ((result['count_2']*100)/result['student_count'])+'%');
			$("#second_bar1").html(Math.round((result['count_2']*100)/result['student_count'])+'%');
			
			}
        
		}
		});
  setInterval(check3,30000);  
}

function check4() {
		
        $.ajax({url: "http://localhost/chartjs/data.php", method: "GET", data: {question:5}, success: function(result){
            if(result['type']=="mc") {
			$("#mcqs").css("display" , "block");
			$("#btn5").replaceWith($("#mcqs"));
			$("#para").html("#5");
			$("#first_bar").css("width" , ((result['count_1']*100)/result['student_count'])+'%');
			$("#first_bar").html(Math.round((result['count_1']*100)/result['student_count'])+'%');
			$("#second_bar").css("width" , ((result['count_2']*100)/result['student_count'])+'%');
			$("#second_bar").html(Math.round((result['count_2']*100)/result['student_count'])+'%');
			$("#third_bar").css("width" , ((result['count_3']*100)/result['student_count'])+'%');
			$("#third_bar").html(Math.round((result['count_3']*100)/result['student_count'])+'%');
			$("#fourth_bar").css("width" , ((result['count_4']*100)/result['student_count'])+'%');
			$("#fourth_bar").html(Math.round((result['count_4']*100)/result['student_count'])+'%');
			}
        
		
		if(result['type']=="tf") {
			$("#tfs").css("display" , "block");
			$("#btn5").replaceWith($("#tfs"));
			$("#para1").html("#5");
			$("#first_bar1").css("width" , ((result['count_1']*100)/result['student_count'])+'%');
			$("#first_bar1").html(Math.round((result['count_1']*100)/result['student_count'])+'%');
			$("#second_bar1").css("width" , ((result['count_2']*100)/result['student_count'])+'%');
			$("#second_bar1").html(Math.round((result['count_2']*100)/result['student_count'])+'%');
			
			}
        
		}
		});
  setInterval(check4,30000);  
}
</script>
</head>
<body>

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
				<!--<a class="navbar-brand" style="visibility: hidden" href="#page-top">QuizRoom</a>
				<a class="navbar-brand" style="visibility: hidden" href="#page-top">QuizRoom</a>
				<a class="navbar-brand" style="visibility: hidden" href="#page-top">QuizRoom</a>
				<a class="navbar-brand" style="visibility: hidden" href="#page-top">QuizRoom</a>
				<a class="navbar-brand" style="visibility: hidden" href="#page-top">QuizRoom</a>
				<a class="navbar-brand"  href="#page-top">RESULTS</a> -->
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


&nbsp;&nbsp;
&nbsp;&nbsp;
&nbsp;&nbsp;
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
					
					

		<button id="btn1" type="button" class="btn btn-primary" onclick="check()">Question1</button>
				<br/><br/></br/>
		<button id="btn2" type="button" class="btn btn-primary" onclick="check1()">Question2</button>
		<br/><br/><br/>
		<button id="btn3" type="button" class="btn btn-primary" onclick="check2()">Question3</button>
		<br/> <br/> <br/>
		<button id="btn4" type="button" class="btn btn-primary" onclick="check3()">Question4</button>
		<br/> <br/> <br/>
		<button id="btn5" type="button" class="btn btn-primary" onclick="check4()">Question5</button>
		<br/> <br/> <br/>
		<div class="jumbotron" id="mcqs" style="display:none">
			<p id="para">
			&nbsp;&nbsp;
			</p>
		<button id="button1" type="button" class="btn btn-primary" style="float:left">A</button>

		<div class="myProgress" id="first_pro">

		<div class="myBar" id="first_bar"></div>
		</div>

<br/>

<button id="button2" type="button" class="btn btn-primary" style="float:left">B</button>
<div class="myProgress" id="second_pro">
  <div class="myBar" id= "second_bar"></div>
</div>
<br/>

<button id="button3" type="button" class="btn btn-primary" style="float:left">C</button>
<div class="myProgress" id="third_pro">
  <div class="myBar" id= "third_bar"></div>
</div>
<br/>

<button id="button4" type="button" class="btn btn-primary" style="float:left">D</button>
<div class="myProgress" id="fourth_pro">
  <div class="myBar" id= "fourth_bar"></div>
</div>
<br/>
</div>

<div class="jumbotron" id="tfs" style="display:none">
<p id="para1">
&nbsp;&nbsp;
</p>
<button id="button5" type="button" class="btn btn-primary" style="float:left">T</button>

<div class="myProgress" id="first_pro1">

  <div class="myBar" id="first_bar1"></div>
</div>

<br/>

<button id="button6" type="button" class="btn btn-primary" style="float:left">F</button>
<div class="myProgress" id="second_pro1">
  <div class="myBar" id= "second_bar1"></div>
</div>
<br/>
</div>

	</main>
	</div>
	</section>
</body>
</html>