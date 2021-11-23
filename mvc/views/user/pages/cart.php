<?php 

$_subtotal=0;
$_total=0;
$_discount=0;
$_num=0;
foreach($data['cart_info'] as $item){ 
    $_num ++;
    $_discount+=$item['discount'];
    $_subtotal += (int)$item['money_per_unit']*(int)$item['number'];
    $_total += (int)$item['money_per_unit']*(int)$item['number'] - ($item['discount']/100)*(int)$item['money_per_unit']*(int)$item['number'];
}
$_discount /=$_num;
?> 

<main>
        <div class="basket">
        <div class="basket-labels">
            <ul>
                <li class="item item-heading">Image</li>
                <li class="price">Price</li>
                <li class="quantity">Quantity</li>
                <li class="subtotal">Subtotal</li>
            </ul>
        </div>
        <?php foreach($data['cart_info'] as $item){ 
            extract($item);
        ?> 
        <div class="basket-product">
            <div class="item">
                <div class="product-image">
                    <img
                        src="../public/assets/product_images/<?=$item['image']?>"
                        alt="Placholder Image 2"
                        class="product-frame"
                    />
                </div>
                <div class="product-details">
                    <h1>
                        <strong
                            ><span class="item-quantity"><?=$item['number']?></span> x
                            </strong
                        >
                        <?=$item['product']?>
                    </h1>
                    <p><strong><?=$item['product_type']?></strong></p>
                </div>
            </div>
            <div class="price"><?=$item['money_per_unit']?></div>
            <div class="quantity">
                <input type="hidden" id="id_item" value="<?=$item['id']?>">
                <input
                    id ="number_item"
                    type="number"
                    value="<?=$item['number']?>"
                    min="1"
                    class="quantity-field"
                />
            </div>
            <div class="subtotal"><?php $subtotal = $item['money_per_unit']*$item['number']; echo $subtotal?></div>
            <form action="./delete_item" method="POST">
                <input type="hidden" name="item_id" value="<?=$item['id']?>">
                <button class="remove" name="btn_delete">Remove</button>
            </form>
        </div>
        <?php } ?>
    </div>
    <aside>
        <div class="summary">
            <div class="summary-total-items">
                <span class="total-items"></span> Item in Cart
            </div>
            <div class="summary-subtotal">
                <div class="subtotal-title">Subtotal</div>
                <div
                    class="subtotal-value final-value"
                    id="basket-subtotal"
                >
                    <?php echo $_subtotal ?>
                </div>
            </div>
            <div class="summary-subtotal">
                <div class="discount-title">Discount</div>
                <div class="discount-value"><?php echo $_discount ?>%</div>
            </div>
            <div class="summary-delivery">Delivery</div>
            <div class="summary-total">
                <div class="total-title">Total</div>
                <div class="total-value final-value" id="basket-total">
                <?php echo $_total ?>
                </div>
            </div>
            <div class="summary-checkout">
                <input type="hidden" id="_id_order" value=<?=uniqid()?>>
                <input type="hidden" id="_final_total" value=<?=$_total?>>
                <button class="checkout-cta">Check out</button>
            </div>
        </div>
    </aside>
</main>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?php echo SCRIPT_ROOT.'/public/js/cart.js';?>"></script>
