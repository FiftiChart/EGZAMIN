let aktualne_dane = document.getElementById("aktualne_dane")
var APIurl = "http://api.nbp.pl/api/exchangerates/tables/A/?format=json"



aktualne_dane.addEventListener("click", event=>{
    fetch(APIurl)
    .then(function(response){
        return response.json()
    })
    .then(function(data){
        console.log(data[0].rates)
        var xhtml = new XMLHttpRequest()
        xhtml.open("POST", "dataupdate.php", true)
        xhtml.setRequestHeader("Content-Type", "application/json;charset=UTF-8")
        xhtml.send(JSON.stringify(data[0].rates))
    })
    .catch(function(error){
        console.log('Błąd pobierania dnaych z API NBP:',error)
    })
    setTimeout(function(){
        location.reload();
    }, 1000);
})