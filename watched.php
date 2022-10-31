<?php
@include 'config.php';

$id = $_REQUEST['id'];

$update = "UPDATE animetitle SET animetitle_watched = '1' WHERE animetitle_id = '" . $id . "'";
if (mysqli_query($conn, $update)){
    print ("Your Reminder Has Been Updated");
}else{
    print("Failed! Please Try Again");
}

echo "<script>location.href='animelists.php'</script>";

?>