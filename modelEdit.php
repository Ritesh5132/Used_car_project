<?php
include "../db.php";
$model_id = $_REQUEST['model_id'];
// select query for brand
$brandsql = "SELECT * FROM brand";
$brandresult = mysqli_query($connection, $brandsql);

//Select query for model
$editSql = "SELECT * FROM model WHERE model_id = '$model_id'";
$editResult = mysqli_query($connection, $editSql);
if (mysqli_num_rows($editResult) > 0) {
    $data = mysqli_fetch_assoc($editResult);
        $model_id = $data['model_id'];
        $model_name = $data['model_name'];
        $transmission_type = $data['transmission_type'];
        $brand_id = $data['brand_id'];
        $fuel_name = $data['fuel_name'];
        $car_type = $data['car_type'];


    
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
        <h2 class="text-center mt-3">Update Model</h2>
        <div class="modelform mt-3">
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                <div class="row flex-column align-items-center border modelform-set justify-content-around">
                    <input type="hidden" name="model_id" value="<?php echo $model_id?>">
                    <div class="col-6 mt-2">
                        <div class="form-group">
                            <label for="model">Model Name:</label>
                            <input type="text" name="model" value="<?php echo $model_name?>" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="brand">Update Brand:</label>
                            <select name="brand" id="" class="form-control" required>
                                <option value="" selected disabled>Select Brand</option>
                               <?php
                               
                               if (mysqli_num_rows($brandresult) > 0) {
                                    while ($row = mysqli_fetch_assoc($brandresult)) {
                                        if ($row['brand_id'] == $data['brand_id']) {
                                            $select = "selected";
                                        }else{
                                            $select = "";
                                        }
                                        echo '<option value="'.$row['brand_id'].'">'.$row['brand_name'].'</option>';
                                    }
                               }else{
                                echo "brand data not found";
                               }
                               
                               
                               ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="transmission">Transmission Type:</label>
                            <select name="transmission" id="" class="form-control" required>
                                <option value="" selected disabled>Select Transmission Type</option>
                                <option value="manual">Manual</option>
                                <option value="automatic">Automatic</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="fuel">Fuel Type:</label>
                            <select name="fuel" id="" class="form-control" required>
                                <option value="" selected disabled>Select Fuel Type</option>
                                <option value="petrol">Petrol</option>
                                <option value="diesel">Diesel</option>
                                <option value="cng">CNG</option>
                                <option value="electric">Electric</option>
                                <option value="hybrid">Hybrid</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="cartype">Car Type:</label>
                            <select name="cartype" id="" class="form-control" required>
                                <option value="" selected disabled>Select Car Type</option>
                                <option value="sedan">Sedan</option>
                                <option value="hatchback">Hatchback</option>
                                <option value="suv">SUV</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mt-2">
                        <input type="submit" value="Submit" class="btn btn-primary w-25">
                    </div>

                </div>
            </form>
        </div>
    </div>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>