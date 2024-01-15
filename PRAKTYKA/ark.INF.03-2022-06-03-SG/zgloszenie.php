<?php
$low = $_POST["lowisko"];
$dat = $_POST["data"];
$sed = $_POST["sedzia"];

$c = mysqli_connect("localhost", "root", "", "wedkarstwo");
$kw1 = "INSERT INTO zawody_wedkarskie VALUES (NULL , 0, $low, '$dat', '$sed')";
$q = mysqli_query($c,$kw1);

mysqli_close($c);
?>