<?php
    $check_con = mysqli_connect("localhost", "root", "");
    $create_db = "CREATE DATABASE IF NOT EXISTS kantor";
    mysqli_query($check_con,$create_db);
    mysqli_close($check_con);
  
    $con = mysqli_connect("localhost", "root", "","kantor");
    $create_table = "CREATE TABLE IF NOT EXISTS kursy_walut (
    id INT AUTO_INCREMENT PRIMARY KEY,
    waluta VARCHAR(3) NOT NULL,
    kurs DECIMAL(10, 4) NOT NULL,
    data DATE NOT NULL)";
    mysqli_query($con, $create_table);
    mysqli_close($con);
  ?>