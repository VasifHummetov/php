<?php













//$filename = 'uploads/webdictionary.txt';

//$myfile = fopen($filename, "r") or die("Unable to open file!");
//// Output one character until end-of-file
//while(!feof($myfile)) {
//    echo fgetc($myfile);
//}
//
//fclose($myfile);

//chmod($filename, 0200);

//var_dump(is_readable($filename));
//die;

//if (is_readable($filename)) {
//    echo fread($handle, filesize($filename));
//}else {
//    echo "blabla";
//}

// fread() , oxumaq ucun , mode mutleq "r" olmalidir
// fwrite() , yazmaq ucun istifade olunur, mode "w" olmalidir

//echo fread($handle, filesize($filename));

//fwrite($handle, 'Salam dunya');

//fwrite($handle, 'Salam dunya2 ');

//fclose($handle);


//echo file_get_contents('https://big.az'); // cUrl

?>


<!DOCTYPE html>
<html>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="file" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>
