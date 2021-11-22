<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/form_style.css">
    <title>Document</title>
</head>
<body style="margin-top: 60px;">
    
    <div><h2>Edit product information</h2></div>
    <form action="./update_product" method="POST" name="update_product" onsubmit="return validateFormUpdateProduct()"  enctype="multipart/form-data">
        <div class="container">
            <input style="display: none;" type="text" name="product_id" value="<?=$data['product_info']['id']?>">

            <label for="type"><b>Type</b></label>
            <input type="text" placeholder="Enter type" name="type" value="<?php echo $data['product_info']['type']?>" required>

            <label for="name"><b>Name</b></label>
            <input type="text" placeholder="Enter Name" name="name" value="<?php echo $data['product_info']['name']?>" required>

            <label for="number"><b>Number</b></label>
            <input type="text" placeholder="Enter number" name="number" value="<?php echo $data['product_info']['number']?>" required>

            <label for="description"><b>Description</b></label>
            <input type="text" placeholder="Enter description" name="description" value="<?php echo $data['product_info']['description']?>" required>

            <label for="price"><b>Price</b></label>
            <input type="text" placeholder="Enter price" name="price" value="<?php echo $data['product_info']['price']?>" required>

            <label for="discount"><b>Discount (%)</b></label>
            <input type="text" placeholder="Enter discount" name="discount" value="<?php echo $data['product_info']['discount']?>" required>

            <label for="image"><b>Image</b></label> </br>
            <img src="../public/assets/product_images/<?=$data['product_info']['image']?>" alt="" style="width:80px;"> </br>

            <label for="image">Change image</label>
            <input type="file" name="productImage" id="productImage"> 
            </br></br>
                
            <button type="submit" name="btn_update">Submit</button>
            <button type="button" class="btn-cancel" onclick="window.history.back();">Cancel</button>
        </div>
    </form> 

</body>
</html>