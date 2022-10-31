<?php
@require_once 'config.php';

$id = $_REQUEST['id'];

$delete = "DELETE FROM animetitle WHERE animetitle_id = '" . $id . "'";
if (mysqli_query($conn, $delete)){
    print ("Your Reminder Has Been Deleted");
}else{
    print("Failed! Please Try Again");
}

echo "<script>location.href='animelists.php'</script>";

?>