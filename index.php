<?php
require 'core/init.php';
include 'includes/overall/header.php';
?>
<h1>Books</h1>
<p>Books in the store</p>

<?php
if (isset($_SESSION['user_id']))
{
    echo 'Logged in';
} else
{
    echo 'not logged in';
}
?>
<div id="products-wrapper">
    <?php
    //current URL of the Page. cart_update.php redirects back to this URL
    $current_url = base64_encode($url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);

    $results = $mysqli->query("SELECT * FROM products ORDER BY id ASC");
    if ($results) {

        //fetch results set as object and output HTML
        while ($obj = $results->fetch_object()) {
            echo '<div class="product">';
            echo '<form method="post" action="cart_update.php">';
            echo '<div class="product-thumb"><img src="images/' . $obj->product_img_name . '"></div>';
            echo '<div class="product-content"><h3>' . $obj->product_name . '</h3>';
            echo '<div class="product-desc">' . $obj->product_desc . '</div>';
            echo '<div class="product-info">';
            echo 'Price ' . $currency . $obj->price . ' | ';
            echo 'Qty <input type="text" name="product_qty" value="1" size="3" />';
            echo '<button class="add_to_cart">Add To Cart</button>';
            echo '</div></div>';
            echo '<input type="hidden" name="product_code" value="' . $obj->product_code . '" />';
            echo '<input type="hidden" name="type" value="add" />';
            echo '<input type="hidden" name="return_url" value="' . $current_url . '" />';
            echo '</form>';
            echo '</div>';
        }
    }
    ?>
</div>
    <?php include 'includes/overall/footer.php'; ?>