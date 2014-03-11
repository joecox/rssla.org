<?php
function loadPictures()
{
	db_connect();;
	$results = $db_select_all("Pictures");
	$arraySize = count($results);
	if($arraySize = 0)
		echo "No more pictures in the database. Yay!";
	else{
	for($i = 0; $i < $arraySize; $i++;)	//will not loop through if count = 0;
		{
		$taggedPeople = $db_select("SELECT tagged FROM TaggedDB WHERE pictureID = " . $results[$i]["id"]);
		echo '<div class="block">
		<img id="photo" src="';
		echo $results[$i]["filepath"];
		echo '"/>
		<div id="text">
			<p>Submitted by:'
		echo $results[$i]["submittedBy"];
		echo '<br>Tagged: <br>';
		for($j = 0; $j < count($taggedPeople); $j++)
		{
			echo $taggedPeople[$j]["tagged"];
			echo "<br>";
		}
		echo '<form action="">
					<input type="checkbox" name="destination" value="Instagram">Instagram<br></input>
						<input type="checkbox" name="destination" value="Web Banner">Web Banner</input>
							</form>
							<span class="button" color=000000 <a href="http://google.com">Authorize!</a></span>
							<span class="button" color=000000 <a href="http://google.com">Remove</a></span>
						</p>
					</div>
				</div>'}}
}

// function acceptPicture($id)
// {

// }
?>