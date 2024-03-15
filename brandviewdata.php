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

            <th>Brand Name</th>
            <th>Brand logo</th>
            <th>Action</th>

        </tr>
        <?php 
        $selectSql = "SELECT * FROM brand";
        $seletResult = mysqli_query($connection, $selectSql);
        if(mysqli_num_rows($seletResult) > 0){
            while ($row = mysqli_fetch_assoc($seletResult)) {
               ?>
               <tr>
               <th class="pt-4"><?php echo $row ['brand_id']?></th>
                <th class="pt-4"><?php echo $row ['brand_name']?></th>
                <td class="text-center"><img src="../upload/<?php echo $row ['brand_logo']?>" alt="" width="60px" height="60px"></td>
                <td class="pt-4">
                    <a href="brandedit.php?brand_id=<?php echo $row ['brand_id']?>" class="btn btn-success">Update</a>
                    <a href="branddelete.php?brand_id=<?php echo $row ['brand_id']?>" class="btn btn-danger">Delete</a>
                </td>
               </tr>
          <?php  }
        };
        ?>
    </table>
    </div>
    

<script src="./js/bootstrap.min.js"></script>

</body>
</html>