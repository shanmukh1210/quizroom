<?php include 'database.php'; ?>
<?php 
   session_start(); 

  // set question number
  
    if(!isset($_SESSION['room_name'])) {  
    $_SESSION['room_name']="LSPBWO";
    $_SESSION['score']=0;	
	$_SESSION['easy'] = array();
	$_SESSION['medium'] = array();
	$_SESSION['difficult'] = array();
	$_SESSION['level']=1;
	$_SESSION['prev']=0;
	$_SESSION['count']=1;
	$_SESSION['i']=0;
	$_SESSION['j']=0;
	$_SESSION['k']=0;
	
	
	
	

	
}
?>


