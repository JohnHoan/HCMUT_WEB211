<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo SCRIPT_ROOT.'/public/css/product_detail.css';?>">
    <title>Document</title>
</head>
<body>
    <div class="card-wrapper">
        <div class="card">
            <!-- card left -->
            <div class="product-imgs">
                <div class="img-display">
                    <div class="img-showcase">
                        <img
                            src="https://themoshavfarm.com/wp-content/uploads/2021/02/botgungsaylanhhu100gr-1-600x600.jpg"
                            alt="image"
                        />
                    </div>
                </div>
            </div>
            <!-- card right -->
            <div class="product-content">
                <h2 class="product-title"><?=$data['product_info']['name']?></h2>
                <div class="product-price">
                    <p class="last-price">
                        Discount: <span><?=$data['product_info']['discount']?>%</span>
                    </p>
                    <p class="new-price">
                        Price: <span><?=$data['product_info']['price']?> ₫</span>
                    </p>
                </div>

                <div class="product-detail">
                    <h2>about this item:</h2>
                    <p>
                    <?=$data['product_info']['type']?>
                    </p>
                    <p>
                    <?=$data['product_info']['description']?>
                    </p>
                </div>

                <div class="purchase-info">
                    <form action="../../CartController/add_to_cart" method="POST">
                        <input type="number" name="number" min="0" value="1"/>
                        <input style="display: none;" type="text" name="product_id" value="<?=$data['product_info']['id']?>">
                        <button type="submit" class="add-cart" name="btn_add" type="button" class="btn">
                        Add to Cart <i class='bx bx-cart'></i>
                        </button>
                        <button class="buy-now" type="button" class="btn">Buy Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>