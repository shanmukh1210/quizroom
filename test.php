<?php include 'database.php'; ?>
<?php
	session_start();
	$_SESSION['room_name']="LSPBWO";
	$room_name="LSPBWO";
	if (isset($_POST['question'])){
			$question=$_POST['question']
			//$type=$_POST['type'];
			$query = "SELECT *FROM questions";
			//$questions = $mysqli->query($query);
			$total = sizeof($question);
			for($i=0;$i<$total;$i++) {
			$x=$question[$i];
			$type=$x['type'];
			$count=$x['count'];
			$question_text=$x['ques'];
			$choices = $x['options'];
			$checked = $x['check'];
			$question_number=$i;
			if($type=="mcq") {
			//$correct_choice = $_POST['correct_choice'];
			 
			//$choices[1] = $mysqli->real_escape_string($_POST['choice1']);
			//$choices[2] = $mysqli->real_escape_string($_POST['choice2']);
			//$choices[3] = $mysqli->real_escape_string($_POST['choice3']);
			//$choices[4] = $mysqli->real_escape_string($_POST['choice4']);
			//$choices[5] = $_POST['choice5'];
						
			
			//question query
			$query = "INSERT INTO questions (question_number, text,type,room_name)
						VALUES('$question_number','$question_text','$type','$room_name')";
						
				//run query
				
				$insert_row = $mysqli->query($query) or die ($mysqli->error._LINE_);

					// inserting
					
				if($insert_row)
				{
					$query = "INSERT INTO results (question_id,type,room)
						VALUES('$question_number','$type','$room_name')";
				
				$insert_row = $mysqli->query($query) or die ($mysqli->error._LINE_);
				$k=0;
					foreach($choices as $choice => $value)
					{
						if($value != '')
						{
							//if($correct_choice == $choice)
							//{
								//$is_correct = 1;
							//}
							//else
							//{
								//$is_correct = 0;
							//}
							$is_correct=$checked[$k];
							$k++;
							$query = "INSERT INTO choices (question_number,is_correct,text,type,room_name)
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
			$query = "INSERT INTO questions (question_number, text,type,room_name)
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
							$query = "INSERT INTO choices (question_number,is_correct,text,type,room_name)
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
							$query = "INSERT INTO choices (question_number,is_correct,text,type,room_name)
										VALUES ('$question_number','$is_correct','$value','$type','$room_name')";
							//run query
							$insert_row = $mysqli->query($query);
							
							if(!$insert_row){
								die('Error : ('.$mysqli->errno . ') '. $mysqli->error);
							}
						}
					
					}
				
			}
		}
			
			
		
		
?>