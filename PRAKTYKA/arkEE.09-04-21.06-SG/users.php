<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel administratora</title>
    <link rel="stylesheet" href="styl4.css">
</head>

<body>
    <div class="baner">
        <h3>Portal Społecznościowy - panel administratora</h3>
    </div>
    <div class="lewy">
        <h4>Użytkownicy</h4>
        <?php //skrypt 1
            $c = mysqli_connect("localhost", "root", "", "dane4");
            $kw1 = "SELECT id, imie, nazwisko, rok_urodzenia, zdjecie FROM osoby LIMIT 30";
            $q = mysqli_query($c,$kw1);
            $date = date("Y");
            // print_r($date);
            while($f = mysqli_fetch_row($q)){
                $age = $date - $f[3];
                echo "$f[0]. $f[1] $f[2], $age<br>";
            }
        ?>
        <a href="./settings.html">Inne ustawienia</a>
    </div>
    <div class="prawy">
        <h4>Podaj id użytkownika</h4>
        <form action="./users.php" method="POST">
            <input type="number" name="identyfikator" min="0" step="1">
            <input type="submit" value="ZOBACZ" id="wysli">
        </form>
        <hr>
        <?php //skrypt 2
            if($_SERVER["REQUEST_METHOD"] == "POST"){
            $iden = $_POST["identyfikator"];
            if(!empty($iden)){
            $kw2 = "SELECT imie, nazwisko, rok_urodzenia, opis, zdjecie, nazwa FROM osoby INNER JOIN hobby ON osoby.Hobby_id = hobby.id WHERE (osoby.id = $iden)";
            $q = mysqli_query($c,$kw2);
            while($f = mysqli_fetch_row($q)){
                echo "<h2>$iden. $f[0] $f[1]</h2>";
                echo "<img src='$f[4]' alt='$iden'>";
                echo "<p>Rok urodzenia: $f[2]</p>";
                echo "<p>Opis: $f[3]</p>";
                echo "<p>Hobby: $f[5]</p>";
            }}
        }
        mysqli_close($c);
        ?>
    </div>
    <div class="stopka">
        Stronę wykonał: PESEL
    </div>
</body>

</html>