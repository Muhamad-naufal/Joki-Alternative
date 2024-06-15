<?php
include "../config.php";

$result = mysqli_query($Connection, "DELETE FROM `portofolio` WHERE porto_id = '$_GET[porto_id]'");

header("Location: ../portofolio.php");

?>