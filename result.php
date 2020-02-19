<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<?php
//print_r($_FILES);
//echo"<br>";
define('_PATH', dirname(__FILE__));
echo $_FILES["user_img"]["name"]."<br>";
echo $_FILES["user_img"]["type"]."<br>";
echo ($_FILES["user_img"]["size"]/1024/1024)."<br>";
$extention = array("jpeg","jpg","png");
$info=explode(".",$_FILES["user_img"]["name"]);
list($width, $height) = getimagesize($_FILES["user_img"]["tmp_name"]);
// Output

if (($_FILES["user_img"]["size"] > 1000000)){
    echo '  <div class="alert alert-warning alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Warning!</strong> This extention is limited .
  </div>';
}
if($width <150 && $height<200)
{

}

elseif(in_array(end($info),$extention)) {


        move_uploaded_file($_FILES["user_img"]["tmp_name"], "images/" . time() . "." . end($info));
}

else{
    echo '  <div class="alert alert-warning alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Warning!</strong> This extention is not allowed .
  </div>';
}

// Get file extension
$infoZip=explode(".",$_FILES["zip_img"]["name"]);
$filename=$_FILES["zip_img"]["name"];
$ext = pathinfo($filename , PATHINFO_EXTENSION);
$extentionZip = array("zip");
if (($_FILES["zip_img"]["size"] >2000000)){
    echo '  <div class="alert alert-warning alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Warning!</strong> This extention is limited .
  </div>';
}
elseif(in_array(end($info),$extentionZip)&&$_FILES["zip_img"]["size"] < 2000000) {
    $tmp_name=$_FILES["zip_img"]["tmp_name"];
    $zip = new ZipArchive;
    $res = $zip->open($tmp_name);
    if ($res === TRUE) {

            $path = _PATH . "/gallary/";

            // Extract file
            $zip->extractTo($path);
            $zip->close();

            echo 'Unzip!';


    }else {
        echo 'failed!';
    }

}

else{

    echo '  <div class="alert alert-warning alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Warning!</strong> This extention is not allowed.
  </div>';
}
//foreach($_POST as $item)
//    if(is_array($item)){
//       print_r($item)."<br>";
//    }
//    else{
//        echo "<br>";
//{ echo $item."<br>";
//
//
//    }
//}

?>
<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>

</body>
</html>

