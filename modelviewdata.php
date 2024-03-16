<?php
include "../db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">

</head>
<body>
    <div class="container">
    <table class="table ">
        <tr>
            <th>Sr. No.</th>
            <th>Model Name</th>
            <th>Transmission Type</th>
            <th>Brand</th>
            <th>Fuel Type</th>
            <th>Car Type</th>
            <th>Action</th> 
        </tr>
        <?php 
        $num = 1;
        $selectSql = "SELECT * FROM model JOIN brand ON model.brand_id = brand.brand_id";
        $seletResult = mysqli_query($connection, $selectSql);
        if(mysqli_num_rows($seletResult) > 0){
            while ($row = mysqli_fetch_assoc($seletResult)) {
               ?>
               <tr>
               <th class="pt-4"><?php echo $num++ ?></th>
                <th class="pt-4"><?php echo $row['model_name']?></th>
                <td class="pt-4"><?php echo $row['transmission_type']?></td>
                <td class="pt-4"><?php echo $row['brand_name'] ?></td>
                <td class="pt-4"><?php echo $row['fuel_name'] ?></td>
                <td class="pt-4"><?php echo $row['car_type'] ?></td>
                <td class="pt-4">
                    <a href="modelEdit.php?model_id=<?php echo $row['model_id']?>" class="btn btn-success">Update</a>
                    <a href="modelDelete.php?model_id=<?php echo $row['model_id']?>" class="btn btn-danger">Delete</a>
                </td>
               </tr>
          <?php  }
        }else{
            echo "data not found";
        }
        ?>
    </table>
    </div>
    

<script src="./js/bootstrap.min.js"></script>

</body>
</html>