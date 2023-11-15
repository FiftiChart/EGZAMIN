<?php
    $nr_karetki = $_POST['nr_karetki'];
    $ratownik_1 = $_POST['ratownik_1'];
    $ratownik_2 = $_POST['ratownik_2'];
    $ratownik_3 = $_POST['ratownik_3'];
    $c = mysqli_connect('localhost','root','','ee09');
    $q = mysqli_query($c,"INSERT INTO ratownicy (nrKaretki, ratownik1, ratownik2, ratownik3) VALUES ($nr_karetki, '$ratownik_1', '$ratownik_2', '$ratownik_3')");
    echo("Do bazy zostało wysłane zapytanie: INSERT INTO ratownicy (nrKaretki, ratownik1, ratownik2, ratownik3) VALUES ($nr_karetki, '$ratownik_1', '$ratownik_2', '$ratownik_3');");
    mysqli_close($c);
?>