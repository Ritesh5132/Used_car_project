<?php
include "../db.php";
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $brand_name = $brand_logo = '';
    $brand_name = $_POST['brand'];
    // echo "<pre>";
    // print_r ($brand_logo = $_FILES['brandlogo']);
    // echo "</pre>";
    $brand_logo = $_FILES['brandlogo']['name'];
    $temp_logo = $_FILES['brandlogo']['tmp_name'];
    $destination = '../upload/' . $brand_logo;
    move_uploaded_file($temp_logo, $destination);

    $insertSql = "INSERT INTO `brand`(`brand_id`, `brand_name`, `brand_logo`) VALUES (NUll,'$brand_name','$brand_logo')";
    $inserResult = mysqli_query($connection, $insertSql);
    // if($inserResult){
    //     echo "inserted";
    // }else{
    //     echo "not inserted";
    // }
}



?><!DOCTYPE html>
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
                <input type="hidden" name="brand_id" value="">

                <div class="col-8">
                    <div class="form-group">
                        <label for="">Brand Name:</label>
                        <input type="text" name="brand" value="" class="form-control" required>
                    </div>
                </div>

                <div class="col-8">
                    <div class="form-group">
                        <label for="" class=" mt-3">Upload Image:</label>
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