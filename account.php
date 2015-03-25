<?php
include_once 'search.php';
//require 'core/init.php';
include 'includes/overall/staff_header.php';

?>
<h1>
    Account of: 
</h1>
<div id="products-wrapper">
    <div class="view-cart">
        <?php
        $current_url = base64_encode($url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
        if (isset($_SESSION["products"])) {
            $total = 0;
            echo '<form method="post" action="paypal-express-checkout/process.php">';
            echo '<ul>';
            $cart_items = 0;
            foreach ($_SESSION["products"] as $cart_itm) {
                $product_code = $cart_itm["code"];
                $results = $mysqli->query("SELECT product_name,product_desc, price FROM product_temp WHERE product_code='$product_code' LIMIT 1");
                $obj = $results->fetch_object();

                echo '<li class="cart-itm">';
                echo '<span class="remove-itm"><a href="cart_update.php?removep=' . $cart_itm["code"] . '&return_url=' . $current_url . '">&times;</a></span>';
                echo '<div class="p-price">' . $currency . $obj->price . '</div>';
                echo '<div class="product-info">';
                echo '<h3>' . $obj->product_name . ' (Code :' . $product_code . ')</h3> ';
                echo '<div class="p-qty">Qty : ' . $cart_itm["qty"] . '</div>';
                echo '<div>' . $obj->product_desc . '</div>';
                echo '</div>';
                echo '</li>';
                $subtotal = ($cart_itm["price"] * $cart_itm["qty"]);
                $total = ($total + $subtotal);

                echo '<input type="hidden" name="item_name[' . $cart_items . ']" value="' . $obj->product_name . '" />';
                echo '<input type="hidden" name="item_code[' . $cart_items . ']" value="' . $product_code . '" />';
                echo '<input type="hidden" name="item_desc[' . $cart_items . ']" value="' . $obj->product_desc . '" />';
                echo '<input type="hidden" name="item_qty[' . $cart_items . ']" value="' . $cart_itm["qty"] . '" />';
                $cart_items ++;
            }
            echo '</ul>';
            echo '<span class="check-out-txt">';
            echo '<strong>Total : ' . $currency . $total . '</strong>  ';
            echo '</span>';
            echo '</form>';
        } else {
            echo 'Your Cart is empty';
        }
        ?>
    </div>
</div>


<div class="widget">
    <div id="products-wrapper">
        <div class="shopping-cart">
            <h2>Add Funds</h2>
            <div class="inner">
                <form action="account.php" method="post">
                    <ul id="login">
                        <li>
                            Add funds:<br>
                            <input type="text" name="funds">
                        </li>
                        <li>
                            <input type="submit" name="add" value="Add">
                        </li>
                    </ul>
                </form>
                <?php
                if (isset($_POST['add'])) {
                    $amount = $_POST['funds'];
                    $stmt = $mysqli->query("SELECT account_balance FROM users WHERE first_name = '$name' OR last_name = '$name'");
                    if ($stmt) {
                        $balance = $stmt->account_balance;
                        $total = $balance + $amount;
                        $update = $mysqli->query("UPDATE users SET account_balance = '$total' ");
                        if ($update) {
                            echo 'Successful transfer of ' . $amount . 'bringing total to' . $total;
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php
include 'includes/overall/footer.php';
