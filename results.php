<html>
    <head>
        <title>jQuery post form data using .ajax() method by codeofaninja.com</title>
         
    </head>
<body>

 <div id='response'></div>
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js "></script>
<script>
	function executeQuery() {
        $.ajax({
            type: 'POST',
            url: 'testing.php', 
            data: 'Hello'
        })
        .done(function(data){
             
            // show the response
            $('#response').html(data);
             
        })
        .fail(function() {
         
            // just in case posting your form failed
            alert( "Posting failed." );
             
        });
		
  
 
}

$(document).ready(function() {
  setInterval(executeQuery, 2000);
});
</script>
 
</body>
</html>
