<?php

$c = mysqli_connect("localhost", "root", "");
$kw1 = "CREATE DATABASE IF NOT EXISTS waluty";

mysqli_query($c, $kw1);

mysqli_close($c);

$c = mysqli_connect("localhost", "root", "", "waluty");

$kw2 = "CREATE TABLE IF NOT EXISTS kursy (id_kursu INT PRIMARY KEY AUTO_INCREMENT, data DATE, nazwa VARCHAR(3), kwota FLOAT(4,4))";

$q = mysqli_query($c, $kw2);
mysqli_close($c);
