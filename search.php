<?php
error_reporting(0);
require 'core/init.php';
require 'core/functions/security.php';
include 'includes/overall/staff_header.php';
?>


<div class="widget">
    <div id="products-wrapper">
        <div class="shopping-cart">
            <h1>Search</h1>
            <div class="inner">
                <form method="post" action="search.php?go" id="searchform">
                    <ul id="search">
                        <li>
                            Search Student:<br>
                            <input type="text" name="search"/>
                        </li>
                        <li>
                            <input type="submit" name="submit" value="Search"/>
                        </li>
                    </ul>
                </form>

            </div>
        </div>
    </div>
</div>

<?php

if (isset($_POST['submit'])) {
    if (isset($_GET['go'])) {
        if (preg_match("/[A-Z  | a-z]+/", $_POST['search'])) {
            $records = array();
            if ($result = $mysqli->query("SELECT * FROM users WHERE first_name LIKE '% " . $_POST['search'] . "%' OR last_name LIKE '%" . $_POST['search'] . "%'")) {
                if ($result->num_rows()) {
                    while ($row = $result->fetch_object()) {
                        $records[] = $row;
                    }
                    $records->free();
                }
            }
        }
    }
} else {
    echo 'Please enter a search query';
}
?>

<?php
if (!count($records)) {
    echo 'No Records';
} else {
    ?>
    <table>
        <thead>
            <tr>
                <td>First Name</td>
                <td>Second Name</td>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($records as $r) {
                ?>
                <tr>
                    <td><?php echo escape($r->first_name); ?></td>
                    <td><?php echo escape($r->second_name); ?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <?php
}
?>
<?php
include 'includes/overall/footer.php';
