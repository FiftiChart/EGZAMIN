<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wycieczki po Europie</title>
    <link rel="stylesheet" href="styl4.css">
</head>
<body>
    <div class="baner">
        <h1>BIURO TURYSTYCZNE</h1>
        &lt;
    </div>
    <div class="dane">
        <h3>Wycieczki, na które są wolne miejsca</h3>
        <ul>
            <?php //skrypt 1
                $c = mysqli_connect("localhost", "root", "", "biuro");
                $kw1 = "SELECT id, dataWyjazdu, cel, cena FROM wycieczki";
                $q = mysqli_query($c,$kw1);

                while($f = mysqli_fetch_row($q)){
                    echo "<li>
                    $f[0]. dnia $f[1] jedziemy do $f[2], cena: $f[3]
                    </li>";
                }
            ?>
        </ul>
    </div>
    <div class="lewy">
        <h2>Bestselery</h2>
        <table>
            <tr>
                <td>Wenecja</td>
                <td>kwiecień</td>
            </tr>
            <tr>
                <td>Londyn</td>
                <td>lipiec</td>
            </tr>
            <tr>
                <td>Rzym</td>
                <td>wrzesień</td>
            </tr>
        </table>
    </div>
    <div class="srodkowy">
    <h2>Nasze zdjęcia</h2>
    <?php //skrypt 2
        $kw2 = "SELECT nazwaPliku, podpis from zdjecia ORDER BY podpis DESC";
        $q = mysqli_query($c,$kw2);

        while($f = mysqli_fetch_row($q)){
            echo "<img src='$f[0]' alt='$f[1]'>";
        }

        mysqli_close($c);
    ?>
    </div>
    <div class="prawy">
        <h2>Skontaktuj się</h2>
        <a href="turysta@wycieczki.pl">napisz do nas</a>
        <p>telefon: 111222333</p>
    </div>
    <div class="stopka">
        <p>Stronę wykonał: Maciej Glugla</p>
    </div>
</body>
</html>