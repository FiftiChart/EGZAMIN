<!DOCTYPE html>
<html lang="pl-PL">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Piłka nożna</title>
    <link rel="stylesheet" href="styl2.css">
</head>

<body>
    <div class="baner">
        <h3>Reprezentacja Polski W Piłce Nożnej</h3>
        <img src="obraz1.jpg" alt="reprezentacja">
    </div>


    <main>
        <div class="lewy">
            <form action="liga.php" method="POST">
                <select name="lista" id="">
                    <option value="1" selected>Bramkarze</option>
                    <option value="2">Obrońcy</option>
                    <option value="3">Pomocnicy</option>
                    <option value="4">Napastnicy</option>
                </select>

                <button type="submit" name="zobacz">ZOBACZ</button>

            </form>

            <img src="zad2.png" alt="piłka">
            <br><br>
            <p>Autor: Maciej Glugla</p>
        </div>
        <div class="prawy">
            <ol>
                <?php
                $c = mysqli_connect('localhost', 'root', '', 'egzamin2');
                $q = mysqli_query($c, "SELECT imie, nazwisko from zawodnik WHERE pozycja_id = $numer");

                mysqli_close($c);
                ?>
            </ol>

        </div>

    </main>

    <h3>Liga Mistrzów</h3>

    <div class="TeamContainer-wrapper">
        <?php
        $c = mysqli_connect('localhost', 'root', '', 'egzamin2');
        $q = mysqli_query($c, "SELECT zespol, punkty, grupa FROM liga ORDER BY punkty DESC");
        mysqli_close($c);

        ?>
    </div>

</body>

</html>