<?php
require 'core/init.php';
include 'includes/overall/staff_header.php';
?>
<h1>Search</h1>
<div class="inner">
                <form method="get">
                    <ul id="search">
                        <li>
                            Search Student:<br>
                            <input type="text" name="search">
                        </li>
                        <li>
                            <input type="submit" value="Search">
                        </li>
                    </ul>
                </form>
            </div>

<?php
$search = $_GET["search"];
$result = $mysqli->query("SELECT * FROM users");
if($result)
{   
    while($row = $result->fetch_assoc())
    {
        echo '<p><a href="account.php">'.$row['first_name'].' '.$row['last_name'].'<br>'.'</a></p';
    }
} else {
    echo 'Nobody with that name';
}
?>
<?php include 'includes/overall/footer.php';
