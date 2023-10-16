<?php
$c = mysqli_connect('localhost', 'root', '', 'wedkowanie');
$imie = $_POST["imie"];
$nazwisko = $_POST["nazwisko"];
$adres = $_POST["adres"];
$q = mysqli_query($c, "INSERT INTO karty_wedkarskie(imie, nazwisko, adres) VALUES ('$imie', '$nazwisko', '$adres');");



mysqli_close($c);
