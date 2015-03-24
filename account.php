<?php
require 'core/init.php';
include 'includes/overall/staff_header.php';
?>
<h1>Account page</h1>

<?php 

$result = $mysqli->query("SELECT * FROM users");
if($result)
{
    while($obj = $result->fetch_object())
    {
        echo '<h2>' . $obj->first_name . '</h2>';
        echo '<h2>' . $obj->last_name . '</h2>';
        echo '<h2>' . $obj->email . '</h2>';
        echo 'account balance: ' . $obj->account_balance;
    }
}
        

?>
<?php include 'includes/overall/footer.php'; ?>
