<?php
include "../config.php";

$result = mysqli_query($Connection, "DELETE FROM `product` WHERE product_id = '$_GET[product_id]'");

header("Location: ../product.php");

?>