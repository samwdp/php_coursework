<?php
error_reporting(0);
require 'core/init.php';
require 'core/functions/security.php';
require 'includes/overall/staff_header.php';
include 'includes/staff_aside.php';
;
?>
<h1>
    Account of: 
    <?php
    echo $results->first_name;
    ?>
</h1>

<?php
if (isset($_POST['submit'])) {
    include 'includes/widgets/basket.php';
    echo '<input type="submit" name="checkout" value="Checkout">';
    if (isset($_POST['checkout'])) {
       $stmt = "SELECT account_balance FROM users WHERE user_name = '$name'";
       if($stmt){
           $theTotal = $stmt->account_balance;
           $temp =  $theTotal - $total;
           echo $temp;
       }
    }
}
?>



<?php
include 'includes/overall/footer.php';
