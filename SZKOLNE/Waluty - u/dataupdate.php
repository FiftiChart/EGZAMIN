<?php
    $dane = json_decode(file_get_contents("php://input"));
    $c = mysqli_connect("localhost", "root", "", "waluty");
    $needed = ["USD", "GBP", "NBP", "EUR", "CHF"];
    
    foreach($dane as $f){
        if(in_array($f->code, $needed)){
        $data = date("Y-m-d");
        $nazwa = $f->code;
        $wartosc = $f->mid;
        $kw = "INSERT INTO kursy (data, nazwa, kwota) VALUES ('$data', '$nazwa', $wartosc)";
        mysqli_query($c,$kw);
        }
    }
        mysqli_close($c);
?>