<?php
    $dane = json_decode(file_get_contents("php://input"));
    print_r($dane);

    $c = mysqli_connect("localhost", "root", "", "waluty");

    foreach($dane as $f){
        $data = date("Yyyy-mm-dd");
        $nazwa = $f->code;
        $wartosc = $f->mid;
        $kw = "INSERT INTO kursy (data, nazwa, kwota) VALUES ('$data', '$nazwa', $wartosc)";
        $q = mysqli_query($c,$kw);
    }

?>