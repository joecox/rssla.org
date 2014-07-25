var examples =
	[
	"Art", 
	"Asian American Studies",
	"Bioengineering",
	"Biology",
	"Computer Science", 
	"Dance",
	"Economics",
	"Film/Theater",
	"History",
	"Math",
	"Philosophy",
	"Physics",
	"Zoology"
	]

$(function() {
var thinggy = 
	d3.select("div.fileholder")
	.selectAll("img")
	.data(examples)
	.enter()
	.append("div")
	.attr("class", "file");

	thinggy
		.append("img")
		.attr("src", "folder5.svg")
		.attr("class", "filePicture");
	thinggy
		.append("div")
		.attr("class", "discriptor")
		.text(function(d){return d;});


/*
d3.select("div.fileholder")
	.data(examples)
	.enter()
	.append("div")
	.text(function(d){return d;});
*/

});
