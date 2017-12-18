<?php include 'database.php' ; ?>
<?php session_start(); ?>
<?php
	$room_name = $_SESSION['room_name'];

	if(!isset($_SESSION['score'])){
		$_SESSION['score'] = 0 ;
	}
	

	if($_POST){
	$number = $_POST['number'] ;
	$selected_choice = $_POST['choice'];
	$next = $number + 1;
	$query = "SELECT * FROM results
				WHERE question_id = $number AND room = 'LSPBWO'";
	$result = $mysqli->query($query);
	$row=$result->fetch_assoc();
	$count_1=$row['count_1'];
	$count_2=$row['count_2'];
	$count_3=$row['count_3'];
	$count_4=$row['count_4'];
	$count=$row['student_count'];
	$count=$count+1;
	if($selected_choice==0) {
	$count_1=$count_1+1; 
	}
	if($selected_choice==1) {
	$count_2=$count_2+1; 
	}
	if($selected_choice==2) {
	$count_3=$count_3+1; 
	}
	if($selected_choice==3) {
	$count_4=$count_4+1; 
	}
	$query = "UPDATE results SET count_1= $count_1, count_2 = $count_2, count_3= $count_3, count_4 = $count_4, student_count=$count WHERE question_id=$number";
						
	$insert_row = $mysqli->query($query);
							
							if(!$insert_row){
								die('Error : ('.$mysqli->errno . ') '. $mysqli->error);
							}
	//echo $selected_choice;
	
	// getting total questions
	
	$query  = "SELECT * FROM quick_questions WHERE room_name = '$room_name'";
	$result = $mysqli->query($query);
	$total = $result->num_rows;
	
	
	/* getting correct choice */ 
	//$query = "SELECT * FROM choices
		//		WHERE question_number = $number AND is_correct = 1";
	
	//get result
	//$result = $mysqli->query($query) or die($mysqli->error._LINE_);
	
	//$row = $result->fetch_assoc();
	
	//set correct choice
	//$correct_choice = $row['id'];
	
	
	
	//if($correct_choice == $selected_choice) {
		// $_SESSION['score']=$_SESSION['score']+1;
		//$score=$score+1;
//	}
	//else
	//{
		//$_SESSION['score']=5;
	//}
		if($number == $total){
		    //echo $score;
			header("Location: endpage.php");
			exit();
		}else
		{
			header("Location: question1.php?n=".$next);
		}	
}
?>