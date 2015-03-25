<div class="widget">
    <div id="products-wrapper">
        <div class="shopping-cart">
            <h1>Search</h1>
            <div class="inner">
                <form method="post" action="staff_checkout.php">
                    <ul id="search">
                        <li>
                            Search Student:<br>
                            <input type="text" name="search">
                        </li>
                        <li>
                            <input type="submit" name="submit" value="Search">
                        </li>
                    </ul>
                </form>
                <?php
                $name = $_POST['search'];
                if (isset($_POST['submit'])) {
                    if (preg_match("/[A-Z  | a-z]+/", $_POST['search'])) {
                        $results = $mysqli->query("SELECT first_name, last_name, account_balance FROM users WHERE first_name LIKE '%$name%' OR last_name LIKE '%$name%'");
                        if ($results->num_rows) {
                            while ($obj = $results->fetch_object()) {
                                echo '<form>';
                                echo '<ul>';
                                echo '<li>' . $obj->first_name . '</li>';
                                echo '<li>' . $obj->last_name . '</li>';
                                echo '<li>' . $obj->account_balance . '</li>';
                                echo '</ul>';
                                echo '</form';
                            }
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>

