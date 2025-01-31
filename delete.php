<?php

require 'dbcont.php';

$id = $_GET['id'];
mysqli_query($conn, "DELETE From tbl_mhs where id=$id");
header("location:index.php");
exit;
?>