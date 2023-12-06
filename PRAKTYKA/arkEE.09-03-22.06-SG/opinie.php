<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opinie klientów</title>
    <link rel="stylesheet" href="styl3.css">
</head>
<body>
    <div class="baner">
        <h1>Hurtownia spożywcza</h1>
    </div>
    <div class="glowny">
        <h2>Opinie naszych klientów</h2>
        <?php //skrypt 1
            $c = mysqli_connect("localhost", "root", "", "hurtownia");
            $kw1 = "SELECT klienci.zdjecie, klienci.imie, opinie.opinia FROM klienci, opinie, typy WHERE klienci.id = opinie.Klienci_id AND typy.id = klienci.Typy_id and typy.id IN (2,3)";
            $q = mysqli_query($c,$kw1);

            while($f = mysqli_fetch_row($q)){
                echo"
                    <div class='opinia'>
                        <img src='./$f[0]' alt='klient'>
                        <blockquote>$f[2]</blockquote>
                        <h4>$f[1]</h4>
                    </div>
                ";
            }
            mysqli_close($c);
        ?>
    </div>
    <div class="s1">
        <h3>Współpracują z nami</h3>
        <a href="http://sklep.pl/">Sklep 1</a>
    </div>
    <div class="s2">
        <h3>Nasi top klienci</h3>
        <ol>
            <?php

            ?>
        </ol>
    </div>
    <div class="s3">
        <h3>Skontaktuj się</h3>
        <p>telefon: 111222333</p>
    </div>
    <div class="s4">
        <h3>Autor: Maciej</h3>
    </div>
</body>
</html>