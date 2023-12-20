<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wędkowanie</title>
    <link rel="stylesheet" href="styl_1.css">
</head>
<body>
    <div class="baner">
        <h1>Portal dla wędkarzy</h1>
    </div>
    <div class="lewy">
        <div class="lewy1">
            <h3>Ryby zamieszkujące rzeki</h3>
            <ol>
                <?php //skrypt1
                    $c = mysqli_connect("localhost", "root", "", "wedkowanie");
                    $kw1 = "SELECT nazwa, akwen, wojewodztwo FROM ryby INNER JOIN lowisko ON ryby.id = lowisko.Ryby_id WHERE lowisko.rodzaj = 3";
                    $q = mysqli_query($c,$kw1);
                    while($f = mysqli_fetch_row($q)){
                        echo "<li>$f[0] pływa w rzece $f[1], $f[2]</li>";
                    }
                ?>
            </ol>
        </div>
        <div class="lewy2">
            <h3>Typy drapieżne naszych wód</h3>
            <table>
                <tr>
                    <th>L.p.</th>
                    <th>Gatunek</th>
                    <th>Występowanie</th>
                </tr>
                <?php //skrypt 2
                    $kw2 = "SELECT id, nazwa, wystepowanie FROM ryby WHERE styl_zycia = 1";
                    $q = mysqli_query($c,$kw2);
                    while($f = mysqli_fetch_row($q)){
                        echo"
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
    </div>
    <div class="prawy">
        <img src="./ryba1.jpg" alt="Sum">
    </div>
    <div class="stopka">
        <p>Stronę wykonał: Maciej Glugla</p>
    </div>
</body>
</html>