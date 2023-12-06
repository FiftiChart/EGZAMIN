<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mój kalendarz</title>
    <link rel="stylesheet" href="styl5.css">
</head>

<body>
    <div class="baner_l"><img src="./logo1.png" alt="Mój kalendarz"></div>
    <div class="baner_p">
        <h1>KALENDARZ</h1>
        <?php
        $c = mysqli_connect("localhost", "root", "", "egzamin6");
        $kw1 = "SELECT miesiac, rok FROM zadania WHERE (dataZadania = '2020-07-01')";
        $q = mysqli_query($c, $kw1);
        $resoult = mysqli_fetch_row($q);
        echo "<h3>miesiąc: $resoult[0], rok: $resoult[1]<h3>";
        ?>
    </div>
    <div class="glowny">
        <?php
        $kw2 = "SELECT dataZadania, wpis FROM zadania WHERE (miesiac = 'lipiec')";
        $q = mysqli_query($c, $kw2);
        while ($f = mysqli_fetch_row($q)) {
            echo "
            <div class='dzien'>
            <h5>$f[0]</h5>
            <p>$f[1]</p>
            </div>
            ";
        }
        ?>
    </div>
    <div class="stopka">
        <form action="./kalendarz.php" method="POST">
            <label>
                dodaj wpis:
                <input type="text" name="wpis">
            </label>
            <input type="submit" value="DODAJ">
        </form>
        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $wpis = $_POST["wpis"];
                $kw3 = "UPDATE zadania SET wpis = '$wpis' WHERE (dataZadania = '2020-07-13')";
                $q = mysqli_query($c,$kw3);
                mysqli_close($c);
            }
        ?>
        <p>Strone wykonał: PESEL</p>
    </div>
</body>

</html>