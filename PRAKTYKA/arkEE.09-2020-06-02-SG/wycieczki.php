<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wycieczki i urlopy</title>
    <link rel="stylesheet" href="styl3.css">
</head>
<body>
    <div id="baner">
        <h1>BIURO PODRÓŻY</h1>
    </div>
    <div id="lewy">
        <h2>KONTAKT</h2>
        <a href="mailto:biuro@wycieczki.pl">napisz do nas</a>
        <p>telefon 555666777</p>
    </div>
    <div id="srd">
        <h2>GALERIA</h2>
        <?php //skrypt 1
            $c = new mysqli("localhost", "root", "", "egzamin3");
            $kw1 = "SELECT zdjecia.nazwaPliku, zdjecia.podpis FROM zdjecia ORDER BY zdjecia.podpis ASC";
            $q = $c->query($kw1);

            while($f = $q->fetch_row()){
                echo "<img src='$f[0]' alt='$f[1]'>";
            }

        ?>
    </div>
    <div id="prawy">
        <h2>PROMOCJE</h2>
        <table>
            <tr>
                <td>Jesnień</td>
                <td>Grupa 4+</td>
                <td>Grupa 10+</td>
            </tr>
            <tr>
                <td>5%</td>
                <td>10%</td>
                <td>15%</td>
            </tr>
        </table>
    </div>
    <div id="dane">
        <h2>LISTA WYCIECZEK</h2>
        <?php //skrypt 2
            $kw2 = "SELECT wycieczki.id, wycieczki.dataWyjazdu, wycieczki.cel, wycieczki.cena FROM wycieczki WHERE wycieczki.dostepna = TRUE";
            $q = mysqli_query($c, $kw2);
            while($f = mysqli_fetch_row($q)){
                echo "$f[0]. $f[1], $f[2], cena: $f[3]<br>";
            }

            mysqli_close($c);
        ?>
    </div>
    <div id="stopka">
        <p>Stronę wykonał: Maciej Glugla</p>
    </div>
</body>
</html>