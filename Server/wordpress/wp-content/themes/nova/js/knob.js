function drawKnob(elementId, subtitle, percentage, arcColor, lineWidth){
	var canvas = document.getElementById(elementId);
	var context = canvas.getContext('2d');
	var x = canvas.width / 2;
	var y = canvas.height / 2 - 15;
	var radius = Math.min(canvas.width, canvas.height) / 2 - (lineWidth + 5);
	var startAngle = 0;
	var endAngle = 0;
	var counterClockwise = false;
	var currPercentage = 0;
	var interval = setInterval(draw, 15);

	function draw(){
		if(currPercentage < percentage){
			context.clearRect(0, 0, canvas.width, canvas.height - 30);
			endAngle = (currPercentage * (2 * Math.PI)) / 100;
			currPercentage++;
			
			context.beginPath();
			context.arc(x, y, radius, startAngle, 2 * Math.PI, counterClockwise);
			context.lineWidth = lineWidth;
			context.strokeStyle = "#43484E";
			context.stroke();
			
			context.beginPath();
			context.arc(x, y, radius, startAngle, endAngle, counterClockwise);
			context.lineWidth = lineWidth;
			context.strokeStyle = arcColor;
			context.stroke();
			
			context.font = "bold 35px Arial";
			context.fillStyle = "#43484E";
			context.textAlign = "center";
			context.textBaseline = "middle"; 
			context.fillText(currPercentage + "%", x, y);
		}else{
			clearInterval(interval);
		}
	}
	
	context.font="bold 20px Arial";
	context.fillStyle = "#43484E";
	context.textAlign="center";
	context.textBaseline="top"; 
	context.fillText(subtitle, x, canvas.height - lineWidth);
}