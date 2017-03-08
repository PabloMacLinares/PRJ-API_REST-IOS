function drawGraphicBar(elementId, skill, percentage, barColor){
	var canvas = document.getElementById(elementId);
	var context = canvas.getContext('2d');
	var currPercentage = 0;
	var endWidth = 0;
	var interval = setInterval(draw, 15);
	
	function draw(){
		if(currPercentage < percentage){
			context.clearRect(0, 0, canvas.width, canvas.height);

			endWidth = (currPercentage * canvas.width) / 100;
			currPercentage++;
			
			context.fillStyle = "#43484E";
			context.fillRect(0, 0, canvas.width, canvas.height);
			
			context.fillStyle = barColor;
			context.fillRect(0, 0, endWidth, canvas.height);
			
			context.fillStyle = "#FFFFFF";
			context.font = "bold 15px Arial";
			context.textAlign ="right";
			context.textBaseline="middle"; 
			context.fillText(currPercentage + "%", canvas.width - 5, canvas.height / 2);
			
			context.textAlign ="left";
			context.textBaseline="middle"; 
			context.fillText(skill, 5, canvas.height / 2);
		}else{
			clearInterval(interval);
		}
	}
}