<?php
include "../db.php";
$brand_id = $_REQUEST['brand_id'];

$deleteSql = "DELETE FROM `brand` WHERE brand_id = '$brand_id '";
$deleteResult = mysqli_query($connection, $deleteSql);
if ($deleteResult) {
    header('location:brandviewdata.php');
}

?>