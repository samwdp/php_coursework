<div class="widget">
    <div id="products-wrapper">
        <div class="shopping-cart">
            <h2>Add Funds</h2>
            <div class="inner">
                <form action="staff_checkout.php" method="post">
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

