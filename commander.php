<?php
require_once 'class/Cfg.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Commander</title>
</head>
<body> 
<a href="logoutPanier.php">Accueil</a> 
<div>TOTAL</div> 
<div id="final"></div> 
<script>
let queryString = decodeURIComponent(window.location.search);
console.log(queryString);
queryString = queryString.substring(1);
console.log(queryString);
let queries = queryString.split("&");
console.log(queries);
for (let i = 0; i < queries.length; i++)
{
  document.querySelector("#final").innerHTML = queries[i];
}
</script>
</body>
</html>