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
    <div><h2>Enter product information</h2></div>
    <form action="./add_product" method="POST"  enctype="multipart/form-data">
        <div class="container">
            <label for="type"><b>Type</b></label>
            <input type="text" placeholder="Enter type" name="type" required>

            <label for="name"><b>Name</b></label>
            <input type="text" placeholder="Enter Name" name="name" required>

            <label for="number"><b>Number</b></label>
            <input type="text" placeholder="Enter number" name="number" required>

            <label for="description"><b>Description</b></label>
            <input type="text" placeholder="Enter description" name="description" required>

            <label for="price"><b>Price</b></label>
            <input type="text" placeholder="Enter price" name="price" required>

            <label for="discount"><b>Discount</b></label>
            <input type="text" placeholder="Enter discount" name="discount" required>

            <label for="image">Image</label>
            <input type="file" name="productImage" id="productImage"> 
            </br></br>
                
            <button type="submit" name="btn_add">Submit</button>
            <button type="button" class="btn-cancel" onclick="window.history.back();">Cancel</button>
        </div>
    </form> 

</body>
</html>