$(document).ready(function(){
	$.ajax({
		url: "http://localhost/quizroom/quizroom/data.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var player = [];
			var score = [];
			var x;

			//for(var i in data) {
				player.push("Option 1");
				x=((45);
				score.push(x);
				player.push("Option 2");
				score.push(30);
				player.push("Option 3");
				score.push(96);
				player.push("Option 4");
				score.push(25);
			//}

			var chartdata = {
				labels: player,
				datasets : [
					{
						label: 'Quick Question',
						backgroundColor: 'rgba(200, 200, 200, 0.75)',
						borderColor: 'rgba(200, 200, 200, 0.75)',
						hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
						hoverBorderColor: 'rgba(200, 200, 200, 1)',
						data: score
					}
				]
			};

			var ctx = $("#mycanvas");

			var barGraph = new Chart(ctx, {
				type: 'bar',
				data: chartdata
			});
		},
		error: function(data) {
			console.log(data);
		}
	});
});