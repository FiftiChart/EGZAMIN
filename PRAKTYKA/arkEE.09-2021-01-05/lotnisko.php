<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl5.css">
    <title>Port Lotniczy</title>
</head>

<body>
    <div class="b_lewy">
        <img src="./zad5.png" alt="logo lotnisko">
    </div>
    <div class="b_srodkowy">
        <h1>Przyloty</h1>
    </div>
    <div class="b_prawy">
        <h3>przydatne linki</h3>
        <a href="./kwerendy.txt">Pobierz...</a>
    </div>
    <div class="glowny">
        <table>
            <tr>
                <th>czas</th>
                <th>kierunek</th>
                <th>numer rejsu</th>
                <th>status</th>
            </tr>
            <?php
            $c = mysqli_connect("localhost", "root", "", "egzamin5");
            $tem = "SELECT czas, kierunek, nr_rejsu, status_lotu FROM przyloty ORDER BY czas ASC";
            $q = mysqli_query($c, $tem);
            while ($f = mysqli_fetch_row($q)) {
                echo "<tr>";
                echo "<td>$f[0]</td>";
                echo "<td>$f[1]</td>";
                echo "<td>$f[2]</td>";
                echo "<td>$f[3]</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
    <div class="s_lewy">
        <p><b>
                <?php
                if (isset($_COOKIE["ciastko"])) {
                    echo "Witaj Ponownie na stronie lotniska";
                } else {
                    echo "Dzień dobry! Strona lotniska używa ciasteczek";
                }
                setcookie("ciastko", " ", time() + 60 * 60 * 2);

                ?>
            </b></p>
    </div>
    <div class="s_prawy">
        Autor: Maciej Glugla
    </div>
</body>

</html>