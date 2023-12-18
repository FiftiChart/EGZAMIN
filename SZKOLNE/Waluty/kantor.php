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
            <button class="menu_button" id="b1">Kantor</button>
            <button class="menu_button" id="b2">Wykres walut</button>
        </div>
        <div class="hania">
            <!-- <button id="aktualne_dane">Aktualizuj dane</button> -->
            <?php
                $c = mysqli_connect("localhost", "root", "", "waluty");
                $date = date("Y-m-d");
                $test = "SELECT * FROM kursy WHERE (kursy.data = '$date')";
                $q = mysqli_query($c,$test);
                if(mysqli_num_rows($q) == 0){
                    echo '<p>Baza danych nie jest aktualna.</p><button id="aktualne_dane">Aktualizuj dane</button>';
                }
                else{
                    echo "<p>Baza danych jest aktualna</p>";
                }
                mysqli_close($c);
            ?>
        </div>
        <div class="main">
            <div class="select">
                <?php
                    $c = mysqli_connect("localhost", "root", "", "waluty");
                    $date = date("Y-m-d");
                    $qu1 = "SELECT nazwa FROM kursy WHERE (kursy.data = '$date')";
                    $q = mysqli_query($c,$qu1);

                    while($f = mysqli_fetch_row($q)){
                        echo "<button class='waluta' id='$f[0]'>$f[0]</button>";
                    };

                ?>
            </div>
            <div class="tabela">
                <?php
                    include("tablecreate.php");
                ?>
            </div>
        </div>
        <script src="skrypt.js"></script>
    </div>
</body>

</html>