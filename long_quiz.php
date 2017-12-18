<?php include 'database.php'; ?>
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<style>
	.jumbotron {
		border-top:4px solid #e8cf12;
		border-radius:0px;
	}
		.box {
    
    background: #809fff;
	border: 2px solid #184287;
    padding: 20px;
    width: 55px;
    height: 15px;  
	line-height:3px;
	font-weight:normal;
}
		.option {
    
   
    padding: 20px; 
    width: 850px;
    height: 15px; 
    font-weight:normal;	
	
}

		.option1 {
    
   
    padding: 20px; 
    width: 850px;
    height: 100px; 
    font-weight:normal;	
	
}

.btn-default{
  border: none;
  padding: 0;
  background: none;
 
}


.glyphicon-remove {
    color:#bfbfbf;
	font-size:25px;
	border:none;
	background : none;
	padding : 0;
    }
.check {
	
	width:25px;
	height:20px;
}

.btn-success{
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





#correct {
	display:none;
}
#correct_c {
	display:none;
}

#save_exit {
	background-color:#8cd9b3;
	text-color:white:
}
.btn-outline-primary {
	background-color:#809fff;
	font-weight:normal;
	border: 2px solid #184287;
    padding: 10px;
}
#quiz_name {
	 width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	font-weight: normal;
}
#explanation {
	 width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	font-weight: normal;
}

	</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>	
<script>
var count=1;
var choices_count= Array.apply(null, Array(1001)).map(Number.prototype.valueOf,4);
$(document).ready(function(){
    $("#mcq").click(function(){
		var m= "MCQ"+String(count);
		var str="#"+String(count);
		var x="save"+String(count);
		var y="add_answer"+String(count);
		var z="mc"+String(count);
		var w="delete"+String(count);
		//var a = "selected" + String(count);
		$tmc = $("#MCQ").clone().attr('id', m);
	    $("#save", $tmc).attr('id', x);
		$("#add_answer", $tmc).attr('id', y);
		$("#mc", $tmc).attr('id', z);
		$("#delete", $tmc).attr('id', w);
		//$("#selected", $tmc).attr('id', a);
        $(".question_number", $tmc).text(str);
		$tmc.show();
		$('.Questions').append($tmc);
		
       	count++;
    });
   
});
function showDiv1() {
		
		var m= "TF"+String(count);
		var str="#"+String(count);
		var z="trf"+String(count);
		$tmc = $("#TF").clone().attr('id', m);
		$(".question_number", $tmc).text(str);
		var m = "true"+String(count);
		$("#trf", $tmc).attr('id',z);
		$("#true",$tmc).attr('id',m);
		var m = "false"+String(count);
		$("#false",$tmc).attr('id',m);
		var m = "correct_answer_tf"+String(count);
		$("#correct_answer_tf",$tmc).attr('id',m);
		$tmc.show();
		$('.Questions').append($tmc);
		count++;
   
}

function showDiv2() {
		
		var m= "SA"+String(count);
		var str="#"+String(count);
		var z="sa"+String(count);
		$tmc = $("#SA").clone().attr('id', m);
		$(".question_number", $tmc).text(str);
		$tmc.show();
		$('.Questions').append($tmc);
		count++;
   
}

function question_save(id)
{
	//alert(id);
	
}

function save_all() {
	var i;
	var array = new Array();
	var x = document.getElementById("Question").querySelectorAll(".type"); 
	for(i=3;i<x.length;i++)
	{
		var m=x[i];
		var id = x[i].id;
		if(id.indexOf("MCQ") >= 0) {
		var q = m.querySelectorAll("#question_text");
		var c = m.querySelectorAll(".choices");
		var exp = m.querySelectorAll("#explanation");
		var questions = new Object();
		questions.number = i-2;
		questions.ques=q[0].value;
		var answers= new Array(26);
		var check=new Array(26);
		var correct_answer = "";
		for(j=0;j<choices_count[i-3];j++)
		{
			var n=c[j];
			var input=n.querySelectorAll(".option");
			answers[j]=input[0].value;
			var checked = n.querySelectorAll(".check");
			if (checked[0].checked)
			{
				check[j]=1;
				var value = 65+j;
				correct_answer = correct_answer + String.fromCharCode(value) + ",";
			}
			else
			{
				check[j]=0;
			}
			
		}
		var a = m.querySelectorAll("#selected");
		questions.level = a[0].value;
		correct_answer = correct_answer.slice(0, -1);
		//alert(correct_answer);
		questions.correct_answer=correct_answer;
		questions.count=choices_count[i-3];
		questions.options=answers;
		questions.check=check;
		questions.type="mcq";
		questions.title=document.getElementById('quiz_name').value;
		questions.explanation = exp[0].value;
		var string = JSON.stringify(questions);
		}
		if(id.indexOf("SA") >= 0) {
		var q = m.querySelectorAll("#question_text_sa");
		var c = m.querySelectorAll("#answer_sa");
		var questions = new Object();
		questions.number = i-2;
		questions.ques=q[0].value;
		questions.answer=c[0].value;
		questions.type="sa";
		var a = m.querySelectorAll("#selected");
		questions.level = a[0].value;
		questions.title=document.getElementById('quiz_name').value;
		var string = JSON.stringify(questions);
		
		}
		$.ajax({  
		type: 'POST',  
		url: 'test1.php', 
		data: {test:string},
		success: function(response) {
			window.location.href ="http://10.0.3.35/quizroom/results.html";
			
    }
	});
	}
	
}

 
function add_answer(id)
{
	var ret = id.replace('add_answer','');
	var n=choices_count[parseInt(ret)];
	var q="mc"+ret;
	var c=document.getElementById(q);
	var m =$(c).find(".choices")[n];
	$(m).css('display','block');
	choices_count[parseInt(ret)]=n+1;
	
	
}

function delete_option(id)
{
	var ret = id.replace('delete','');
	var n=choices_count[parseInt(ret)];
	var q="mc"+ret;
	var c=document.getElementById(q);
	var m =$(c).find(".choices")[n-1];
	$(m).css('display','none');
	choices_count[parseInt(ret)]=n-1;
}

function fun_true(id) {
	var len = id.length;
	var last = id[len-1];
	var str = "correct_answer_tf"+last;
	var str1 = document.getElementById('true1').innerHtml;
	//alert(str1);
   
}

function fun_false(id) {
  document.getElementById('correct_answer_tf').innerHtml="False";
   
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
                <a class="navbar-brand" href="#page-top"><?php echo $room_name; ?>
				</a>
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
						<a href="#contact">REPORTS</a>
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
					&nbsp;&nbsp;
					&nbsp;&nbsp; 
					<h4>Create Quiz<h4>
					<input id="save_exit" type="submit" value="Save and Exit" class="btn btn-outline-primary" style="margin-left:90%" onclick="save_all()"/>
					<br/>
					<br/>
					
					<input id="quiz_name" type="text" name="quiz_name" size=60 onfocus="this.value=''" value="Untitled quiz"/>
					<br/>
					<br/>
					<br/>
                    <div class="Questions" id="Question">
                    <div id="MCQ" style="display:none" class="type">					
					<div id="mc" class="jumbotron jumbotron-fluid">
					
					
					<p>		
							<input id ="save" type="button" name="submit" value="Save" onclick ="question_save(id)" style="margin-left:85%" class="btn btn-success"/ >
						</p>
						
						<p class="question_number">
						</p>
                        <p>						
							&nbsp;&nbsp;
							&nbsp;&nbsp;
							<input class="option"type="text" id="question_text" size=100 />
						</p>
						
						<p>				
							Answer Choice
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							Correct?
						</p>	
							
							<p> 
							<div class="choices"id="1">
								<label class="box">A</label>
						&nbsp;&nbsp;
								<input class="option" type="text" name="choice1" size=60 />
								&nbsp;&nbsp;&nbsp;
							<!--	<button type="button" class="close close-sm" aria-label="Close">&times;</button>-->
							
							<button type="button" class="btn btn-default btn-lg" onclick="delete_option(id)" id="delete">
							<span class="glyphicon glyphicon-remove"></span> 
							</button>
							&nbsp;
								<input class="check" type="checkbox" value="">
								
								
							<br/>
							
						</div>
						</p>
						
						<p> 
						<div class="choices" id="2">
								<label class="box">B</label>
						&nbsp;&nbsp;
								<input class="option" type="text" name="choice2" size=60 />
								&nbsp;&nbsp;&nbsp;
								<button type="button" class="btn btn-default btn-lg" onclick="delete_option(id)" id="delete">
							<span class="glyphicon glyphicon-remove"></span> 
							</button>
							&nbsp;
								<label><input class="check" type="checkbox" value=""></label>
							
							<br>
						</div>
						</p>
						
						<p>
					    <div class="choices" id="3">
						<label class="box">C</label>
						&nbsp;&nbsp;
								<input class="option" type="text" name="choice3" size=60 />
								&nbsp;&nbsp;&nbsp;
								<button type="button" class="btn btn-default btn-lg" onclick="delete_option(id)" id="delete">
							<span class="glyphicon glyphicon-remove"></span> 
							</button>
							&nbsp;
								<label><input class="check" type="checkbox" value=""></label>
							
							<br>
							</div>
						</p>
						
						<p>
						<div class="choices"id="4">
						
								<label class="box">D</label>
						&nbsp;&nbsp;
								<input class="option" type="text" name="choice4" size=60 />
								&nbsp;&nbsp;&nbsp;
								<button type="button" class="btn btn-default btn-lg" onclick="delete_option(id)" id="delete">
							<span class="glyphicon glyphicon-remove"></span> 
							</button>
							&nbsp;
								<label><input class="check" type="checkbox" value=""></label>
							
							<br>
							</div>
						</p>
						
							<p> 
							<div class="choices"id="5" style="display:none">
								<label class="box">E</label>
						&nbsp;&nbsp;
								<input class="option" type="text" name="choice1" size=60 />
								&nbsp;&nbsp;&nbsp;
							<!--	<button type="button" class="close close-sm" aria-label="Close">&times;</button>-->
							
							<button type="button" class="btn btn-default btn-lg" onclick="delete_option(id)" id="delete">
							<span class="glyphicon glyphicon-remove"></span> 
							</button>
							&nbsp;
								<input class="check" type="checkbox" value="">
								
								
							<br/>
							
						</div>
						</p>
						
							<p> 
							<div class="choices"id="6" style="display:none">
								<label class="box">F</label>
						&nbsp;&nbsp;
								<input class="option" type="text" name="choice1" size=60 />
								&nbsp;&nbsp;&nbsp;
							<!--	<button type="button" class="close close-sm" aria-label="Close">&times;</button>-->
							
							<button type="button" class="btn btn-default btn-lg" onclick="delete_option(id)" id="delete">
							<span class="glyphicon glyphicon-remove"></span> 
							</button>
							&nbsp;
								<input class="check" type="checkbox" value="">
								
								
							<br/>
							
						</div>
						</p>
						
							<p> 
							<div class="choices"id="7" style="display:none">
								<label class="box">G</label>
						&nbsp;&nbsp;
								<input class="option" type="text" name="choice1" size=60 />
								&nbsp;&nbsp;&nbsp;
							<!--	<button type="button" class="close close-sm" aria-label="Close">&times;</button>-->
							
							<button type="button" class="btn btn-default btn-lg" onclick="delete_option(id)" id="delete">
							<span class="glyphicon glyphicon-remove"></span> 
							</button>
							&nbsp;
								<input class="check" type="checkbox" value="">
								
								
							<br/>
							
						</div>
						</p>
						
							<p> 
							<div class="choices"id="8" style="display:none">
								<label class="box">H</label>
						&nbsp;&nbsp;
								<input class="option" type="text" name="choice1" size=60 />
								&nbsp;&nbsp;&nbsp;
							<!--	<button type="button" class="close close-sm" aria-label="Close">&times;</button>-->
							
							<button type="button" class="btn btn-default btn-lg" onclick="delete_option(id)" id="delete">
							<span class="glyphicon glyphicon-remove"></span> 
							</button>
							&nbsp;
								<input class="check" type="checkbox" value="">
								
								
							<br/>
							
						</div>
						</p>
						
							<p> 
							<div class="choices"id="9" style="display:none">
								<label class="box">I</label>
						&nbsp;&nbsp;
								<input class="option" type="text" name="choice1" size=60 />
								&nbsp;&nbsp;&nbsp;
							<!--	<button type="button" class="close close-sm" aria-label="Close">&times;</button>-->
							
							<button type="button" class="btn btn-default btn-lg"onclick="delete_option(id)" id="delete">
							<span class="glyphicon glyphicon-remove"></span> 
							</button>
							&nbsp;
								<input class="check" type="checkbox" value="">
								
								
							<br/>
							
						</div>
						</p>
						
							<p> 
							<div class="choices"id="10" style="display:none">
								<label class="box">J</label>
						&nbsp;&nbsp;
								<input class="option" type="text" name="choice1" size=60 />
								&nbsp;&nbsp;&nbsp;
							<!--	<button type="button" class="close close-sm" aria-label="Close">&times;</button>-->
							
							<button type="button" class="btn btn-default btn-lg" onclick="delete_option(id)" id="delete">
							<span class="glyphicon glyphicon-remove"></span> 
							</button>
							&nbsp;
								<input class="check" type="checkbox" value="">
								
								
							<br/>
							
						</div>
						</p>
						
							<p> 
							<div class="choices"id="11" style="display:none">
								<label class="box">K</label>
						&nbsp;&nbsp;
								<input class="option" type="text" name="choice1" size=60 />
								&nbsp;&nbsp;&nbsp;
							<!--	<button type="button" class="close close-sm" aria-label="Close">&times;</button>-->
							
							<button type="button" class="btn btn-default btn-lg" onclick="delete_option(id)" id="delete">
							<span class="glyphicon glyphicon-remove"></span> 
							</button>
							&nbsp;
								<input class="check" type="checkbox" value="">
								
								
							<br/>
							
						</div>
						</p>
						
							<p> 
							<div class="choices"id="12" style="display:none">
								<label class="box">L</label>
						&nbsp;&nbsp;
								<input class="option" type="text" name="choice1" size=60 />
								&nbsp;&nbsp;&nbsp;
							<!--	<button type="button" class="close close-sm" aria-label="Close">&times;</button>-->
							
							<button type="button" class="btn btn-default btn-lg" onclick="delete_option(id)" id="delete">
							<span class="glyphicon glyphicon-remove"></span> 
							</button>
							&nbsp;
								<input class="check" type="checkbox" value="">
								
								
							<br/>
							
						</div>
						</p>
						
							<p> 
							<div class="choices"id="13" style="display:none">
								<label class="box">M</label>
						&nbsp;&nbsp;
								<input class="option" type="text" name="choice1" size=60 />
								&nbsp;&nbsp;&nbsp;
							<!--	<button type="button" class="close close-sm" aria-label="Close">&times;</button>-->
							
							<button type="button" class="btn btn-default btn-lg" onclick="delete_option(id)" id="delete">
							<span class="glyphicon glyphicon-remove"></span> 
							</button>
							&nbsp;
								<input class="check" type="checkbox" value="">
								
								
							<br/>
							
						</div>
						</p>
						
							<p> 
							<div class="choices"id="14" style="display:none">
								<label class="box">N</label>
						&nbsp;&nbsp;
								<input class="option" type="text" name="choice1" size=60 />
								&nbsp;&nbsp;&nbsp;
							<!--	<button type="button" class="close close-sm" aria-label="Close">&times;</button>-->
							
							<button type="button" class="btn btn-default btn-lg" onclick="delete_option(id)" id="delete">
							<span class="glyphicon glyphicon-remove"></span> 
							</button>
							&nbsp;
								<input class="check" type="checkbox" value="">
								
								
							<br/>
							
						</div>
						</p>
						
							<p> 
							<div class="choices"id="15" style="display:none">
								<label class="box">O</label>
						&nbsp;&nbsp;
								<input class="option" type="text" name="choice1" size=60 />
								&nbsp;&nbsp;&nbsp;
							<!--	<button type="button" class="close close-sm" aria-label="Close">&times;</button>-->
							
							<button type="button" class="btn btn-default btn-lg"onclick="delete_option(id)" id="delete">
							<span class="glyphicon glyphicon-remove"></span> 
							</button>
							&nbsp;
								<input class="check" type="checkbox" value="">
								
								
							<br/>
							
						</div>
						</p>
						
							<p> 
							<div class="choices"id="16" style="display:none">
								<label class="box">P</label>
						&nbsp;&nbsp;
								<input class="option" type="text" name="choice1" size=60 />
								&nbsp;&nbsp;&nbsp;
							<!--	<button type="button" class="close close-sm" aria-label="Close">&times;</button>-->
							
							<button type="button" class="btn btn-default btn-lg" onclick="delete_option(id)" id="delete">
							<span class="glyphicon glyphicon-remove"></span> 
							</button>
							&nbsp;
								<input class="check" type="checkbox" value="">
								
								
							<br/>
							
						</div>
						</p>
						
							<p> 
							<div class="choices"id="17" style="display:none">
								<label class="box">Q</label>
						&nbsp;&nbsp;
								<input class="option" type="text" name="choice1" size=60 />
								&nbsp;&nbsp;&nbsp;
							<!--	<button type="button" class="close close-sm" aria-label="Close">&times;</button>-->
							
							<button type="button" class="btn btn-default btn-lg" onclick="delete_option(id)" id="delete">
							<span class="glyphicon glyphicon-remove"></span> 
							</button>
							&nbsp;
								<input class="check" type="checkbox" value="">
								
								
							<br/>
							
						</div>
						</p>
						
							<p>  
							<div class="choices"id="18" style="display:none">
								<label class="box">R</label>
						&nbsp;&nbsp;
								<input class="option" type="text" name="choice1" size=60 />
								&nbsp;&nbsp;&nbsp;
							<!--	<button type="button" class="close close-sm" aria-label="Close">&times;</button>-->
							
							<button type="button" class="btn btn-default btn-lg"onclick="delete_option(id)" id="delete">
							<span class="glyphicon glyphicon-remove"></span> 
							</button>
							&nbsp;
								<input class="check" type="checkbox" value="">
								
								
							<br/>
							
						</div>
						</p>
						
							<p> 
							<div class="choices"id="19" style="display:none">
								<label class="box">S</label>
						&nbsp;&nbsp;
								<input class="option" type="text" name="choice1" size=60 />
								&nbsp;&nbsp;&nbsp;
							<!--	<button type="button" class="close close-sm" aria-label="Close">&times;</button>-->
							
							<button type="button" class="btn btn-default btn-lg" onclick="delete_option(id)" id="delete">
							<span class="glyphicon glyphicon-remove"></span> 
							</button>
							&nbsp;
								<input class="check" type="checkbox" value="">
								
								
							<br/>
							
						</div>
						</p>
						
							<p> 
							<div class="choices"id="20" style="display:none">
								<label class="box">T</label>
						&nbsp;&nbsp;
								<input class="option" type="text" name="choice1" size=60 />
								&nbsp;&nbsp;&nbsp;
							<!--	<button type="button" class="close close-sm" aria-label="Close">&times;</button>-->
							
							<button type="button" class="btn btn-default btn-lg" onclick="delete_option(id)" id="delete">
							<span class="glyphicon glyphicon-remove"></span> 
							</button>
							&nbsp;
								<input class="check" type="checkbox" value="">
								
								
							<br/>
							
						</div>
						</p>
						
							<p> 
							<div class="choices"id="21" style="display:none">
								<label class="box">U</label>
						&nbsp;&nbsp;
								<input class="option" type="text" name="choice1" size=60 />
								&nbsp;&nbsp;&nbsp;
							<!--	<button type="button" class="close close-sm" aria-label="Close">&times;</button>-->
							
							<button type="button" class="btn btn-default btn-lg"onclick="delete_option(id)" id="delete">
							<span class="glyphicon glyphicon-remove"></span> 
							</button>
							&nbsp;
								<input class="check" type="checkbox" value="">
								
								
							<br/>
							
						</div>
						</p>
						
							<p> 
							<div class="choices"id="22" style="display:none">
								<label class="box">V</label>
						&nbsp;&nbsp;
								<input class="option" type="text" name="choice1" size=60 />
								&nbsp;&nbsp;&nbsp;
							<!--	<button type="button" class="close close-sm" aria-label="Close">&times;</button>-->
							
							<button type="button" class="btn btn-default btn-lg" onclick="delete_option(id)" id="delete">
							<span class="glyphicon glyphicon-remove"></span> 
							</button>
							&nbsp;
								<input class="check" type="checkbox" value="">
								
								
							<br/>
							
						</div>
						</p>
						
							<p> 
							<div class="choices"id="23"style="display:none">
								<label class="box">W</label>
						&nbsp;&nbsp;
								<input class="option" type="text" name="choice1" size=60 />
								&nbsp;&nbsp;&nbsp;
							<!--	<button type="button" class="close close-sm" aria-label="Close">&times;</button>-->
							
							<button type="button" class="btn btn-default btn-lg" onclick="delete_option(id)" id="delete">
							<span class="glyphicon glyphicon-remove"></span> 
							</button>
							&nbsp;
								<input class="check" type="checkbox" value="">
								
								
							<br/>
							
						</div>
						</p>
						
							<p> 
							<div class="choices"id="24" style="display:none">
								<label class="box">X</label>
						&nbsp;&nbsp;
								<input class="option" type="text" name="choice1" size=60 />
								&nbsp;&nbsp;&nbsp;
							<!--	<button type="button" class="close close-sm" aria-label="Close">&times;</button>-->
							
							<button type="button" class="btn btn-default btn-lg" onclick="delete_option(id)" id="delete">
							<span class="glyphicon glyphicon-remove"></span> 
							</button>
							&nbsp;
								<input class="check" type="checkbox" value="">
								
								
							<br/>
							
						</div>
						</p>
						
							<p> 
							<div class="choices"id="25" style="display:none">
								<label class="box">Y</label>
						&nbsp;&nbsp;
								<input class="option" type="text" name="choice1" size=60 />
								&nbsp;&nbsp;&nbsp;
							<!--	<button type="button" class="close close-sm" aria-label="Close">&times;</button>-->
							
							<button type="button" class="btn btn-default btn-lg" onclick="delete_option(id)" id="delete">
							<span class="glyphicon glyphicon-remove"></span> 
							</button>
							&nbsp;
								<input class="check" type="checkbox" value="">
								
								
							<br/>
							
						</div>
						</p>
						
							<p> 
							<div class="choices"id="26"style="display:none">
								<label class="box">Z</label>
						&nbsp;&nbsp;
								<input class="option" type="text" name="choice1" size=60 />
								&nbsp;&nbsp;&nbsp;
							<!--	<button type="button" class="close close-sm" aria-label="Close">&times;</button>-->
							
							<button type="button" class="btn btn-default btn-lg" onclick="delete_option(id)" id="delete">
							<span class="glyphicon glyphicon-remove"></span> 
							</button>
							&nbsp;
								<input class="check" type="checkbox" value="">
								
								
							<br/>
							
						</div>
						</p>
						<input id="add_answer" type="submit" value="+ ADD ANSWER" onclick="add_answer(id)" class="btn btn-outline-primary" />
						<br/>
						<br/>
						<label style="font-weight:normal">Difficulty Level:&nbsp;&nbsp;</label>
						<select id="selected" style="font-weight:normal">
						<option value="beg">Beginner</option>
						<option value="eas">Easy</option>
						<option value="med">Medium</option>
						<option value="hard">Hard</option>
						<option value="vhard">Very Hard</option>
						</select>
						<br/>
						<br/>
						<label style="font-weight:normal">Explanation:</label>
						<input id="explanation" type="text" name="explanation" size=60 value=""/>
							
					<br/>
					
					</div>
					</div>
					<div id="TF" style="display:none" class="type">
					<div class="jumbotron" id="trf">
					<form method="post" action="">
					
					<p>
			     	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;
							<input  id="save" type="submit" name="submit" value="Save"  class="btn btn-success"/ >
						</p>
						
						<p class="question_number">
						</p>
			            <p>
							&nbsp;&nbsp;
							&nbsp;&nbsp;
											
							<input id = "question_text_tf" class="option"type="text" name="question_text" size=100 />
							
						</p>
						
						<p>
							Correct Answer:
						</p>
						</form>
						<p>
						<button id="true" type="button" class="btn btn-outline-primary" onclick="fun_true(this.id)" style = "background-color:#669999;  border: 2px solid #00004d; padding: 15px; width: 200px;height: 50px;">True</button>
						<button id="false" type="button" class="btn btn-outline-primary" onclick="fun_false(this.id)" style = "background-color:#a3a375;  border: 2px solid #00004d; padding: 15px; width: 200px;height: 50px;">False</button>
						</p>
						<p id="correct_answer_tf">
						Correct
						</p>
				
					</div>
					<br/>
					</div>
					
					<div id="SA" style="display:none" class="type">
					<div class="jumbotron" id="sa">
					<form method="post" action="">
					
					<p>
			     	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;
							<input  id="save" type="submit" name="submit" value="Save"  class="btn btn-success"/ >
						</p>
						
						<p class="question_number">
						</p>
			            <p>
							&nbsp;&nbsp;
							&nbsp;&nbsp;
											
							<input id = "question_text_sa" class="option"type="text" name="question_text" size=100 />
							
						</p>
						
						<p>
							Correct Answer:
						</p>
						<p>
							&nbsp;&nbsp;
							&nbsp;&nbsp;
											
							<input id = "answer_sa" class="option1"type="text" name="answer" size=100 />
							
						</p>
						<label style="font-weight:normal">Difficulty Level:&nbsp;&nbsp;</label>
						<select id="selected" style="font-weight:normal">
						<option value="beg">Beginner</option>
						<option value="eas">Easy</option>
						<option value="med">Medium</option>
						<option value="hard">Hard</option>
						<option value="vhard">Very Hard</option>
						</select>
						<br/>
						<br/>
						
				
					</div>
					<br/>
					</div>
					</div>
					
					
					<div id="options">
					<p class="normal">
						QUESTIONS
					</p>
					
					<button id="mcq" type="button" class="btn btn-outline-primary">+ Multiple Choice</button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<button id="tf" type="button" class="btn btn-outline-primary" onclick="showDiv1()">+ True or False</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
					<button id="sa" type="button" class="btn btn-outline-primary" onclick="showDiv2()"style= "border-radius: 25px; background-color:white; border: 2px solid #00e673;padding: 15px; width: 200px;height: 50px;">+ Short answer</button>
					
					</div>
					<br/>
					
            </div>
			</main>
      </div>
    </section>

