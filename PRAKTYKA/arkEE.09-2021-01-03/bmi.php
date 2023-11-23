<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twoje BMI</title>
    <link rel="stylesheet" href="styl3.css">
</head>

<body>
    <div class="logo">
        <img src="./wzor.png" alt="wzór BMI">
    </div>
    <div class="baner">
        <h1>Oblicz swoje BMI</h1>
    </div>
    <div class="glowny">
        <table>
            <tr>
                <th>Interpretacja BMI</th>
                <th>wartość minimalna</th>
                <th>Wartość maksymalna</th>
            </tr>
            <?php
            $c = mysqli_connect("localhost", "root", "", "egz3");
            $tr = "SELECT informacja, wart_min, wart_max FROM bmi";
            $q = mysqli_query($c, $tr);
            while ($row = mysqli_fetch_row($q)) {
                echo "<tr>
                    <td>$row[0]</td>
                    <td>$row[1]</td>
                    <td>$row[2]</td>
                    </tr>";
            }

            ?>
        </table>
    </div>
    <div class="lewy">
        <h2>Podaj wagę i wzrost</h2>
        <form action="bmi.php" method="POST">
            Waga: <input type="number" name="numerek" min="1"><br>
            wzrost w cm: <input type="number" name="wzrost" min="1"><br>
            <input type="submit" value="Oblicz i zapamiętaj wynik">
        </form>
        <?php
        if (!empty($_POST["numerek"]) && !empty($_POST["wzrost"])) {
            $numer = $_POST["numerek"];
            $wzrost = $_POST["wzrost"];
            $BMI = ($numer / ($wzrost ** 2)) * 10000;
            if ($BMI >= 0 && $BMI <= 18) {
                $przedzial = 1;
            }
            if ($BMI >= 19 && $BMI <= 25) {
                $przedzial = 2;
            }
            if ($BMI >= 26 && $BMI <= 30) {
                $przedzial = 3;
            }
            if ($BMI >= 31 && $BMI <= 100) {
                $przedzial = 4;
            }
            echo "Twoja waga: $numer; Twój wzrost: $wzrost<br>BMI wynosi: $BMI";
            $data = date("Y-m-d",);
            $tr = "INSERT INTO wynik VALUES (null, $przedzial, '$data', $BMI)";
            $q = mysqli_query($c, $tr);
        }
        ?>
    </div>
    <div class="prawy">
        <img src="./rys1.png" alt="ćwiczenia">
    </div>
    <div class="stopka">
        Autor: Maciej Glugla
        <a href="./kwerendy.txt">Zobacz kwerendy</a>
    </div>
</body>

</html>