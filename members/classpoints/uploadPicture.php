<?php
function uploadFile($firstYearCount, $secondYearCount, $thirdYearCount,
					 $fourthYearCount, $submittedBy, $tagged) 
					//tagged is an array of all people tagged in the Picture
					//should be strings.
					//submittedBy is a memberID
{
if (!empty($_FILES['uploadedPicture'])) //be sure to name it uploadedPicture
	{
		$uploaddir = $_SERVER['DOCUMENT_ROOT'].'/resources/images/classpoints/';
    	$ext = pathinfo($_FILES['uploadedPicture'], PATHINFO_EXTENSION);
    	$query = "INSERT INTO Pictures (submittedBy, firstYearPoints, secondYearPoints, thirdYearPoints, fourthYearPoints) VALUES (";
    	$query .= $submittedBy;
    	$query .= ", ";
    	$query .= $firstYearCount;
    	$query .= ", ";
    	$query .= $secondYearCount;
    	$query .= ", ";
    	$query .= $thirdYearCount;
    	$query .= ", ";
    	$query .= $fourthYearCount;
    	$query .= ")";

		db_connect();
		db_insert($query);
		$id = last_insert_id();

		$image_name = $id . "." . $ext;
		$uploadfile = $uploaddir.$image_name;
		move_uploaded_file($_FILES['uploadedPicture', $uploadfile);
		$query = "UPDATE Pictures SET filepath = '" . $uploadfile . "' WHERE id=" . $id;

		db_insert($query);

		for($i = 0; $i < count($tagged); $i++)
		{
			$query2 = "INSERT INTO TaggedDB (pictureID, submittedBy, tagged)" .
				"VALUES (" . $id . ", " . $submittedBy . ", " .$tagged[$i].")";
			db_insert($query);
		}

	}
else
	echo "No Photo Found.  Please try again.";
}

// function generateUnique()
// {
//  	$query = "SELECT * FROM PICTURES WHERE UNIQUEID =";
// 	for( $i = 0; $i < 200; $i++ ) //Don't have more than 200 images in the database, please
// 		{
// 			$newQuery = $query;
// 			$newQuery .= $i;
// 			$tempArray = db_select($newQuery);
// 			if(count($tempArray) == 0)	//will loop through 1-200, trying to find the first unused variable.  uniqueID should be
// 										// appended to the end of the file name so that they're all def. unique.
// 				return $i;
// 			else
// 				continue;
// 		}
// 	echo "Either the database is currently full, or something went terribly wrong.  Please contact the Communication Committee Director.";
// }
//Depricated. Use "last_inserted_id" from modules instead.
?>