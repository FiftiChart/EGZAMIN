<?php
    print_r($_POST);
    mysqli_connect();
    $imie = $_POST['name'];
    mysqli_query($c, "INSERT INTO tabela (imie, nazwisko, email) VALUES ('$name', ...)")
?>