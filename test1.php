<?php include 'database.php'; ?>
<?php
	session_start();
	$_SESSION['room_name']="LSPBWO";
	$room_name="LSPBWO";
	if ($_POST){
		$rec =  json_decode($_POST['test'], true);
		//print_r($rec['level']);
		if($rec['type'] == "mcq") {
			
			$answer = $rec['correct_answer'];
			$question = $rec['ques'];
			$number = $rec['number'];
			$type = "mc";
			$level = $rec['level'];
			if($level == "beg") {
				$lev = 0;
			}
			else if($level == "eas") {
				$lev = 1;
			}
			else if($level == "med") {
				$lev = 2;
			}
			else if($level == "hard") {
				$lev = 3;
			}
			else {
				$lev = 4;
			}
			$test_name=$rec['title'];
			//echo $test_name;
			$query = "INSERT INTO questions (question_number, text,type,room_name,Level,answer,test_name)
						VALUES('$number','$question','$type','$room_name','$lev','$answer','$test_name')";
			$result = $mysqli->query($query) or die($mysqli->error._LINE);
			$count = $rec['count'];
			$options = $rec['options'];
			$check = $rec['check'];
			for($i = 0; $i < $count; $i++ ) {
				$query = "INSERT into choices (question_number,is_correct,text,type,room_name,Level,test_name) VALUES('$number','$check[$i]','$options[$i]','$type','$room_name','$lev','$test_name')";
				$result = $mysqli->query($query) or die($mysqli->error._LINE);
			}
			
		}
		else if($rec['type'] == "sa"){
			$number = $rec['number'];
			$question = $rec['ques'];
			$type = "sa";
			$test_name = $rec['title'];
			$answer = $rec['answer'];
			$level = $rec['level'];
			if($level == "beg") {
				$lev = 0;
			}
			else if($level == "eas") {
				$lev = 1;
			}
			else if($level == "med") {
				$lev = 2;
			}
			else if($level == "hard") {
				$lev = 3;
			}
			else {
				$lev = 4;
			}
			$count=1;
			$query = "INSERT into questions (question_number,text,type,room_name,Level,answer,test_name) VALUES('$number','$question','$type','$room_name','$lev','$answer','$test_name')";
			$result = $mysqli->query($query) or die($mysqli->error._LINE);
			if($answer != "") {
			$query = "INSERT into choices (question_number,is_correct,text,type,room_name,Level,test_name) VALUES('$number','1','$answer','$type','$room_name','$lev','$test_name')";
				$result = $mysqli->query($query) or die($mysqli->error._LINE);
			}
			
		}
		if($result) {
			$query  = "SELECT * FROM questions WHERE room_name = '$room_name' AND test_name = '$test_name'";
			$result = $mysqli->query($query) or die($mysqli->error._LINE);
			$total = $result->num_rows;
			
			$db_name = $room_name . "_".$test_name;
			$query = "CREATE TABLE $db_name(id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,name VARCHAR(255) NOT NULL)";
			$row = $mysqli->query($query) or die($mysqli->error._LINE);
			$i = 1;
			while($i <= $total) {
				$column = "field" . "_". strval($i);
				$sql= "ALTER TABLE $db_name ADD {$column} VARCHAR(225); ";
				$result = $mysqli->query($sql) ;
				$i = $i + 1;
				
			}
			$column = "count";
			$sql= "ALTER TABLE $db_name ADD {$column} INT(11); ";
			$result = $mysqli->query($sql) ;
			if($result) {
				$query = "SELECT *FROM current_activity where room_name = '$room_name'";
				$result = $mysqli->query($query);
				if($result) {
					$query = "UPDATE current_activity SET type = '1' , test_name = '$test_name' WHERE room_name = '$room_name'";
					$result = $mysqli->query($query);
				}
				else {
					$query = "INSERT INTO current_activity (room_name , test_name, type) VALUES ('$room_name','$test_name','1')";
					$result = $mysqli->query($query);
			}
		
			}

			
		}
		
			
		}
?>