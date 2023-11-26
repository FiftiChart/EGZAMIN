<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kantor</title>
    <link rel="stylesheet" href="StylKantora.css">
</head>

<body>
    <?php include("databasechecked.php");?>
    <div class="page">
        <div class="baner">
            <h1>KANTOR ONLINE</h1>
        </div>
        <div class="menu">
            <button class="menu_button" id="b1">Strona Główna</button>
            <button class="menu_button" id="b2">Kursy</button>
            <!-- <button class="menu_button" id="b3">NBP</button> -->
            <!-- <button class="menu_button" id="b4">Kontakt</button> -->
        </div>
        <div class="hania">
            <button id="aktualne_dane">Aktualizuj dane</button>
            <?php
                $c = mysqli_connect("localhost", "root", "", "waluty");
                $date = date("Y-m-d");
                $test = "SELECT * FROM kursy WHERE (kursy.data = '$date')";
                $q = mysqli_query($c,$test);
                
                mysqli_close($c);
            ?>
        </div>
        <script src="skrypt.js"></script>
    </div>
</body>

</html>