<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Kantor Online</title>
  <script>
    function getCurrencyRate() {
      var apiURL = "https://api.nbp.pl/api/exchangerates/tables/A/?format=json";

      
      fetch(apiURL)
        .then(function(response) {
          return response.json();
        })
        .then(function(data) {
          var xhr = new XMLHttpRequest();
          xhr.open("POST", "sendCurrencyRate.php", true);
          xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
          xhr.send(JSON.stringify(data[0].rates));
        })
        .catch(function(error) {
          console.error('Błąd pobierania danych z API NBP:', error);
        });
    }
  </script>
</head>
<body>
  <?php include("databaseCheck.php");?>
  
  <h1>Kantor Online</h1>

  <button onclick="getCurrencyRate()">Pobierz kurs</button>

  <div id="result">
    
  </div>
</body>
</html>
