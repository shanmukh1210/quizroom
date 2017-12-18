 <?php include 'database.php'; ?>
 <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <title>database connections</title>

	  <style>
	  h1 {
    text-align: center;
    text-transform: uppercase;
    color: #4CAF50;
		}
		.main_div{
			display:grid;
			grid-template-columns: 1fr 2fr 1fr;
		}
		.result{
			margin-top:80px;
			margin-left:60px;
			}
		table {
		border-collapse : collapse;
		borderSpacing : 50px;
		}
		
	  </style>
	  
    </head>
	<body>
    
		
      <?php 
	  if($_POST) {
	  session_start();
	  $room_name = $_SESSION['room_name'];
	  $query = "SELECT * FROM current_activity WHERE room_name = '$room_name'";
	  $result = $mysqli->query($query) or die($mysqli->error._LINE);
	  $row = $result->fetch_assoc();
	  $test_name = $row['test_name'];
	  $table = $room_name."_".$row['test_name'];
      $query  = "SELECT * FROM {$table}";
      $result = $mysqli->query($query) or die($mysqli->error._LINE);
	  $query  = "SELECT answer FROM questions WHERE test_name='$test_name'";
	  $answers = $mysqli->query($query) or die($mysqli->error._LINE);
	  $total = $answers->num_rows;
	  $answer = array();
	  while($check = $answers->fetch_assoc() ) {
		foreach($check as $key => $value) {
			array_push($answer,$value);
			}
	  }
	  //print_r($answer);
      ?>
	  <div class="main_div">
	  <div class="result">

      <table cellpadding="15" cellspacing="5" border="3px;" style= "background-color:#FFF8C6; auto; " >
        <tr>
          <th bgcolor = '#E6E6FA'>Name</th>
		  <?php
			$i = 1;
			
			while($i <= $total) 
			{
		  ?>
          <th bgcolor = "#E6E6FA"><?php echo $i ?></th>
		  <?php
			$i = $i + 1;
			}
		  ?>
		  <th bgcolor = '#E6E6FA'> Score% </th>
          </tr>
        <?php
          while( $row = $result->fetch_assoc() ){
            echo
            "<tr>
			<td bgcolor = '#E6E6FA'> {$row['name']} </td>";
			
			$i = 1;
			$j = 0;
				foreach($row as $key => $value)
				{
				if($i > 2 && $i <= $total+2) {
				if($answer[$j] == $value) {
				echo "<td bgcolor = '#52D017'> {$value}</td>";
				}
				else {
					echo "<td bgcolor = '#E55451'> {$value}</td>";
				}
				$j = $j + 1;
				}
				$i=$i+1;
				
				}
           $score = ($row['count'] / $total ) * 100;
			echo "<td bgcolor =  '#999966'> {$score}% </td>";
           echo " </tr>\n";
          }
		  }
        ?>
      
    </table>
	</div>
	</div>
    </body>
    </html>