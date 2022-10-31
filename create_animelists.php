<?php
require_once 'config.php';


$category = $_REQUEST['cat'];
$text = $_REQUEST['text'];
$animetitledate = $_REQUEST['animetitledate'];
$watched = $_REQUEST['watched'];

if ($watched == '' || $watched == null){
    $watched = 0;
}
$insert = "INSERT INTO animetitle(animetitle_category, animetitle_text, animetitle_date, animetitle_watched) VALUES ";
$insert .= "('" . $category . "',";
$insert .= "'" . $text . "',";
$insert .= "'" . $animetitledate . "',";
$insert .= "'" . $watched . "')";

    if(mysqli_query($conn, $insert)){
    print ("Successfully Create Your Reminder");
    }else{
    print("Failed! Please Try Again");
}

echo "<script>location.href='animelists.php'</script>";

?>

