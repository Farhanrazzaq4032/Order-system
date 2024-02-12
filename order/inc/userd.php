<?php
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
?>
<?php echo flash("msg") ?>

<div class="cart-row">
    <?php
    $query = "SELECT * FROM product";
    $db = new DB();
    $data = $db->select($query);
    foreach ($data as $product) : ?>
        <div class="r">
            <form action="<?php echo URL ?>add-to-cart" method="POST">
                <img src="img/imresizer-1700721094035.jpg" alt="product-image">
                <div class="productD">
                <h4>Name</h4><p><?php echo $product["name"] ?></p>
                </div>
                <div class="productD">
                <h4>Price</h4><p><?php echo $product["price"] ?></p>
                </div>
                <input type="hidden" name="pro_code" value="<?php echo $product["pro_code"] ?>">
                <button class="atcBtn" type="submit" name="addToCart">add to cart</button>
        </div>
        </form>
    <?php endforeach; ?>
</div>