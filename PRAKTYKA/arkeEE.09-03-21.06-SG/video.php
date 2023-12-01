<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video On Demand</title>
    <link rel="stylesheet" href="styl3.css">
</head>
<body>
    <div class="baner_l">
        <h1>Internetowa wypożyczalnia filmów</h1>
    </div>
    <div class="baner_p">
        <table>
            <tr>
                <td>Kryminał</td>
                <td>Horror</td>
                <td>Przygodowy</td>
            </tr>
            <tr>
                <td>20</td>
                <td>30</td>
                <td>20</td>
            </tr>
        </table>
    </div>
    <div class="polecamy">
        <h3>Polecamy</h3>
        <?php //Skrypt 1
            $c = mysqli_connect("localhost", "root", "", "dane3");
            $kw1 = "SELECT id, nazwa, opis, zdjecie FROM produkty WHERE (id = 18 OR id = 22 OR id = 23 OR id = 25)";
            $q = mysqli_query($c,$kw1);
            while($f = mysqli_fetch_row($q)){
                echo "
                <div class='film'>
                    <h4>$f[0]. $f[1]</h4>
                    <img src='$f[3]' alt='film'>
                    <p>$f[2]</p>
                </div>
                ";

            }
        ?>
    </div>
    <div class="fantastyczne">
        <h3>Filmy fantastyczne</h3>
        <?php //Skrypt 2
            $kw2 = "SELECT id, nazwa, opis, zdjecie FROM produkty WHERE (Rodzaje_id = 12)";
            $q = mysqli_query($c,$kw2);
            while($f = mysqli_fetch_row($q)){
                echo "
                <div class='film'>
                    <h4>$f[0]. $f[1]</h4>
                    <img src='$f[3]' alt='film'>
                    <p>$f[2]</p>
                </div>
                ";
            }
        ?>
    </div>
    <div class="stopka">
        <form action="./video.php" method="POST">
            <input type="number" name="usun">
            <input type="submit" value="Usuń film">
        </form>
        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $iden = $_POST["usun"];
                if(!empty($iden)){
                    $kw4 = "DELETE FROM produkty WHERE (produkty.id = $iden)";
                    $q = mysqli_query($c,$kw4);
                }
            }
            mysqli_close($c);
        ?>
        Stronę wykonał: <a href="ja@poczta.com">Maciej Glugla</a>
    </div>
</body>
</html>