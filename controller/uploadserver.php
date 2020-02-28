<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>upload file</title>
</head>
<?PHP 
if(isset($_POST["submit"]))
{
$target_dir = "img/";
$target_file = $target_dir . basename($_FILES["FileHinh"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
	$check = getimagesize($_FILES["FileHinh"]["tmp_name"]);
	if($check != false) {
	echo "File is an image - " . $check["mime"] . ".";
	$uploadOk = 1;
	} else {
	echo "File is not an image.";
	$uploadOk = 0;
	}
// Check if file already exists
if (file_exists($target_file)) {
	echo "Sorry, file already exists.";
	$uploadOk = 0;
}
// Check file size
if ($_FILES["FileHinh"]["size"] > 500000) {
	echo "Sorry, your file is too large.";
	$uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
	echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	$uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
	echo "Sorry, your file was not uploaded.";