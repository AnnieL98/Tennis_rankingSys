<?php
include 'rsconn.php';
$stageid = $_GET['id'];

if (isset($stageid)) {

$sql = "DELETE FROM malestages where stageID = '$stageid'";
if ($conn->query($sql)) {
         header("location:rsmanagestages.php");
}else {
        echo "<script>alert('<?php  echo 'Error' .$conn->error;  ?>');location.href'rshome.php'</script>";

}

}
?>