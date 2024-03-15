<?php
include "../db.php";
$brand_id = $_REQUEST['brand_id'];
// select query using id
$editSql = "SELECT * FROM brand WHERE brand_id = '$brand_id'";
$editresult = mysqli_query($connection, $editSql);
if (mysqli_num_rows($editresult)) {
    $row = mysqli_fetch_assoc($editresult);
    $brandId = $row['brand_id'];
    $brand_name = $row['brand_name'];
    $brand_logo = $row['brand_logo'];
}

// update query

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $brand_name = $_POST['brand'];
    $brand_logo = $_FILES['brandlogo']['name'];
    $temp_logo = $_FILES['brandlogo']['tmp_name'];
    $destination = '../upload/' . $brand_logo;
    move_uploaded_file($temp_logo, $destination);

    $insertSql = "UPDATE `brand` SET `brand_name`='$brand_name',`brand_logo`='$brand_logo' WHERE  brand_id = '$brand_id'";
    $inserResult = mysqli_query($connection, $insertSql);
    // if($inserResult){
    //     echo "inserted";
    // }else{
    //     echo "not inserted";
    // } 
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="./adminstyle.css">
</head>
<body>
<div class="container">
        <div class="formset">
            <h2>Insert Brand</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
            <div class="row flex-column align-items-center border form-input">
                <input type="hidden" name="brand_id" value="<?php echo $brandId ?>">

                <div class="col-8">
                    <div class="form-group">
                        <label for="">Brand Name:</label>
                        <input type="text" name="brand" value="<?php echo $brand_name ?>" class="form-control" required>
                    </div>
                </div>

                <div class="col-8">
                    <div class="form-group">
                        <label for="">Old Image</label>
                    <img src="../upload/<?php  echo $brand_logo ?>" alt="" width="100px" height="100px" class="mt-5">
                        <label for="" class=" mt-3">Select New Image:</label>
                        <input type="file" name="brandlogo" value=""  class="form-control" required>
                    </div>
                </div>  
                
                <div class="d-flex justify-content-center mb-3">
                    <input type="submit" value="Submit" class="btn btn-primary mt-4 w-25">
                </div>

        </div>
        </form>
        </div>
    </div>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>

<?php




?>