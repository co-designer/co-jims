var imageCount = 1;
var total = 5;
var time = window.setInterval(function photoA() {  
	var image = document.getElementById('image');
	imageCount = imageCount + 1;
	if(imageCount > total){imageCount = 1;}
	if(imageCount < 1){imageCount = total;}	
	image.src = "images/slider/slide"+ imageCount +".jpg";
	},2000);

