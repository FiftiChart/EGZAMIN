<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prognoza pogody Wrocław</title>
    <link rel="stylesheet" href="styl2.css">
</head>
<body>
    <div class="baner_lewy"><img src="./logo.png" alt="meteo"></div>
    <div class="baner_srodkowy"><h1>Prognoza Wrocławia</h1></div>
    <div class="baner_prawy"><p>maj, 2019r.</p></div>
    <div class="glowny">
        <table>
            <tr>
                <th>DATA</th>
                <th>TEMPERATURA W NOCY</th>
                <th>TEMPERATURA W DZIEŃ</th>
                <th>OPADY [mm/h]</th>
                <th>CIŚNIENIE [hPa]</th>
            </tr>
            <?php

            // Zrobić skrypt dwiema pętlami
            // pobieranie rekordów - zewnętrzną
            // wpisywanie <td> - wewnętrzną (foreach)

            $c = mysqli_connect("localhost", "root", "", "prognoza");
            $q = mysqli_query($c ,"SELECT * FROM pogoda WHERE miasta_id = 1 ORDER BY data_prognozy");


            // while ($f = mysqli_fetch_row($q)){
            //     print_r("<tr>");
            //     for ($i = 2; $i<=6; $i++){
            //         print_r("<td>$f[$i]</td>");
            //     }
            //     print_r("</tr>");
            // }

            $l = mysqli_num_rows($q);

            for ($i = 0; $i<$l; $i++){
                $f = mysqli_fetch_row($q);
                unset($f[0],$f[1]);
                print_r("<tr>");
                foreach ($f as $k){
                    print_r("<td>$k</td>");
                }
                print_r("<tr>");
            }

            mysqli_close($c);

            ?>
        </table>
    </div>
    <div class="lewy"><img src="./obraz.jpg" alt="Polska, Wrocław"></div>
    <div class="prawy"><a href="./kwerendy.txt">Pobierz kwerendy</a></div>
    <div class="stopka"><p>Stronę wykonał: PESEL</p></div>
</body>
</html>