<?php include 'database.php'; ?>
<?php
				$query="TRUNCATE TABLE questions";
				$result=$mysqli->query($query) or die ($mysqli->error._LINE_);
				$query="TRUNCATE TABLE choices";
				$result=$mysqli->query($query) or die ($mysqli->error._LINE_);
				$query="TRUNCATE TABLE results";
				$result=$mysqli->query($query) or die ($mysqli->error._LINE_);
				header("location: questions_test.php");
?>