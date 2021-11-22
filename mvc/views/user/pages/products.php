<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <?php foreach($data['product_list'] as $product){ 
                extract($product);
            ?> 
            <td>
                <div>
                <p><?php echo $product['name']?></p>
                <a href="product_detail/<?=$product['id']?>">
                    <img src="../public/assets/product_images/<?=$product['image']?>" alt="" style="width:120px; height: 120px;">
                </a>
                </div>
                <form action="../CartController/add_to_cart" method="POST">
                        <input style="display: none;" type="text" name="product_id" value="<?=$product['id']?>">
                        
                        <button name="btn_add">Add-to-cart</button>
                </form>
            </td>
            <?php } ?>
        </tr>
    </table>
</body>
</html>