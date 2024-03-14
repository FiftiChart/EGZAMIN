<?php

$c = mysqli_connect("localhost", "root", "");
$kw1 = "CREATE DATABASE IF NOT EXISTS waluty";

mysqli_query($c, $kw1);

mysqli_close($c);

$c = mysqli_connect("localhost", "root", "", "waluty");

$kw2 = "CREATE TABLE IF NOT EXISTS kursy (id_kursu INT PRIMARY KEY AUTO_INCREMENT,
 data DATE NOT NULL,
 nazwa VARCHAR(3) NOT NULL,
 kwota DECIMAL(10,4) NOT NULL)";

mysqli_query($c, $kw2);
mysqli_close($c);
