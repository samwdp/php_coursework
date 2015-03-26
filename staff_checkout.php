<?php
error_reporting(0);
require 'core/init.php';
require 'core/functions/security.php';
require 'includes/overall/staff_header.php';
include 'includes/staff_aside.php';
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
}
?>

<input type="submit" name="checkout" value="Checkout">
<?php 
if (!isset($_POST['checkout'])) {
       $stmt = "SELECT * FROM users";
       if($stmt){
           $theTotal = $rows->account_balance; 
           $temp =  $theTotal - $total;
           echo $temp;
          // $update = $mysqli->query();
       }
    }
?>

<?php
include 'includes/overall/footer.php';
