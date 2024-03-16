<?php
include "../db.php";
$brandSql = "SELECT * FROM brand";
$brandresult = mysqli_query($connection, $brandSql);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {;
    $model_name = $transmission = $fuel = $cartype = '';
    $model_name = $_POST['model'];
    $transmission = $_POST['transmission'];
    $fuel = $_POST['fuel'];
    $cartype = $_POST['cartype'];
    $brand = $_POST['brand'];

    $insertSql = "INSERT INTO `model`(`model_name`, `transmission_type`,`brand_id`, `fuel_name`, `car_type`) VALUES ('$model_name','$transmission',$brand ,'$fuel','$cartype')";


    // "INSERT INTO `model`(`model_name`, `transmission_type`, ``, ``) VALUES ('','$transmission','','')";
    echo $insertSql ;   

    $insertResult = mysqli_query($connection, $insertSql);
    if ($insertResult) {
        echo "inserted";
    } else {
        echo "not inserted";
    }
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
        <h2 class="text-center mt-5">Insert Model</h2>
        <div class="modelform mt-5">
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                <div class="row flex-column align-items-center border modelform-set justify-content-around">
                    <input type="hidden" name="model_id" value="">
                    <input type="hidden" name="brand_id" value="">

                    <div class="col-6 mt-2">
                        <div class="form-group">
                            <label for="model">Model Name:</label>
                            <input type="text" name="model" value="" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="brand">Select Brand:</label>
                            <select name="brand" id="" class="form-control" required>
                                <option value="" selected disabled>Select Brand</option>
                                <?php
                                if (mysqli_num_rows($brandresult) > 0) {
                                    while ($row = mysqli_fetch_assoc($brandresult)) {
                                        echo '<option value="' . $row['brand_id'] . '">' . $row['brand_name'] . '</option>';
                                    }
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