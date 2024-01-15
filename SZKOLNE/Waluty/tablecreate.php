<?php
    function tworzenie($valu){
        $c = mysqli_connect("localhost", "root", "", "waluty");
        echo json_encode($valu);
        $kw5 = "SELECT kursy.data, kwota FROM kursy WHERE nazwa = '$valu';";
        $q = mysqli_query($c, $kw5);
        echo "<table><tr><th colspan='2'>$valu</th></tr>
        <tr>
            <th>Data</th><th>Wartość</th>
        </tr>
        ";
        while($f = mysqli_fetch_row($q)){
        echo "
            <tr>
                <td>$f[0]</td><td>$f[1]</td>
            </tr>
        ";
        }
        echo "</table>";
        mysqli_close($c);
    }

    if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'){
    $valu = json_decode(file_get_contents("php://input"), true);
        tworzenie($valu);
    }
    
    
?>