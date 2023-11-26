<?php
$receivedData = json_decode(file_get_contents("php://input"));

$con = mysqli_connect("localhost", "root", "","kantor");

$Courrencies = ["USD", "GBP", "NBP", "EUR", "CHF"];
foreach ($receivedData as $currency) {
    if (in_array($currency->code, $Courrencies)) {
        $waluta = $currency->code;
        $kurs = $currency->mid;
        $data = date("Y-m-d");

        $sql_insert = "INSERT INTO kursy_walut (waluta, kurs, data) VALUES ('$waluta', $kurs, '$data')";
        mysqli_query($con, $sql_insert);
    }
}

mysqli_close($con);
?>
