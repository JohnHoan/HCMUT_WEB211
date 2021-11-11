<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/table_style.css">
    <title>Document</title>
</head>
<body>
    <div><h2>Products Management</h2></div>
    <div>
        <a class="btn-add" href="../ProductController/add_product">Add product</a>
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Type</th>						
                <th>Name</th>
                <th>Number</th>
                <th>Description</th>
                <th>Price</th>
                <th>Discount</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data['product_list'] as $product){ 
                extract($product);
            ?> 
        
            <tr>
                <td><?php echo $product['id']?></td>
                <td><?php echo $product['type']?></td> 
                <td><?php echo $product['name']?></td>
                <td><?php echo $product['number']?></td>    
                <td><?php echo $product['description']?></td>  
                <td><?php echo $product['price']?></td> 
                <td><?php echo $product['discount']?></td> 
                <td><img src="../public/assets/product_images/<?=$product['image']?>" alt="" style="width:80px;"></td>                
                <td>
                    <form action="./update_product" method="POST"  class="btn">
                        <input style="display: none;" type="text" name="product_id" value="<?=$product['id']?>">
                        <button class="btn-edit" name="btn_edit">Edit</button> 
                        <button class="btn-delete" name="btn_delete" onclick="return confirm('Are you sure you want to delete this product?');">Delete</button>
                    </form>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>