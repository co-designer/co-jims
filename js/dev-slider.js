var imageCount = 1;
var total = 11;
var time = window.setInterval(function photoA() {  
	var image = document.getElementById('image');
	imageCount = imageCount + 1;
	if(imageCount > total){imageCount = 1;}
	if(imageCount < 1){imageCount = total;}	
	image.src = "images/developers/s"+ imageCount +".jpg";
	},2000);

