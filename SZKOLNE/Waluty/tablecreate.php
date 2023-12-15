<?php
    $valu = json_decode(file_get_contents('php://input'), true);
    echo json_encode($valu);
    $c = mysqli_connect("localhost", "root", "", "waluty");

?>