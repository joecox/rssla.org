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
//On Document ready, load up the outermost layer; in this case,
//	the subjects.  Maybe we can add in schools? Or maybe even
//	syllabuses or notes, if we want to incorporate that into
// 	the testbank.  This is going to be a doozy
var ComputerScience = [
	"CS 31",
	"CS 32",
	"CS 33",
	"CS 35L",
	"CS 111",
	"CS 181",
	"CS M151A"
	]
$(function(){
populateField(examples);
/*
d3.select("div.fileholder")
	.data(examples)
	.enter()
	.append("div")
	.text(function(d){return d;});
*/

});

function populateField(elements){
//clear the element first
$(".fileholder").empty();
var thinggy = 
	d3.select("div.fileholder")
	.selectAll("img")
	.data(elements)
	.enter()
	.append("div")
	.attr("class", "file");

	thinggy
		.append("img")
		.attr("src", "folder5.svg")
		.attr("class", "filePicture")
		.attr("id", function(d){return d.replace(/\s/g, '');});
	thinggy
		.append("div")
		.attr("class", "discriptor")
		.text(function(d){return d;});


$(".filePicture").click(function(){
console.log(this.id);
populateField(window[this.id]);
$(".filepath").append( this.id + " > ");
});
}

$(".fileholder").click(function(){
console.log(this.id);
});
