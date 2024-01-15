<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wynajem pokoi</title>
    <link rel="stylesheet" href="styl2.css">
</head>

<body>
    <div class="baner">
        <h1>Pensjonat pod dobrym humorem</h1>
    </div>
    <div class="lewy">
        <a href="./index.html">GŁÓWNA</a>
        <img src="./1.bmp" alt="pokoje">
    </div>
    <div class="srodkowy">
        <a href="./cennik.php">CENNIK</a>
        <table>
            <?php //skrypt
            $c = mysqli_connect("localhost", "root", "", "wynajem");
            $kw = "SELECT * FROM pokoje";
            $q = mysqli_query($c, $kw);
            while ($f = mysqli_fetch_row($q)) {
                echo "
                        <tr>
                            <td>$f[0]</td>
                            <td>$f[1]</td>
                            <td>$f[2]</td>
                        </tr>
                    ";
            }

            mysqli_close($c);
            ?>
        </table>
    </div>
    <div class="prawy">
        <a href="./kalkulator.html">KALKULATOR</a>
        <img src="3.bmp" alt="pokoje">
    </div>
    <div class="stopka">Stronę opracował: Maciej Glugla</div>
</body>

</html>