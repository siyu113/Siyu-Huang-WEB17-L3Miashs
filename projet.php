<html>
<head>
   <meta charset="utf-8"/>
     <title>Vous voulez chercher quelque chose ?</title>
</head>

<body>
 <h1> L'information de la région</h1>
 <form method="GET" action="resultat.php">

 <p><img src="http://ekladata.com/U2BfGVoF6nDVEnITGJkuwEgyONU.jpg"/></p>

 <p>Les Hauts-de-France est une région administrative du Nord de la France, créée par la réforme territoriale de 2014. 
    Résultat de la fusion du Nord-Pas-de-Calais et de la Picardie, elle s'est d'abord appelée provisoirement Nord-Pas-de-Calais-Picardie. 
    Elle s'étend sur 31 813 km et compte cinq départements : l'Aisne, le Nord, l'Oise, le Pas-de-Calais et la Somme. 
    Elle est présidée par Xavier Bertrand, depuis le 4 janvier 2016, et son chef-lieu est Lille.</p>

 <p>Vous voulez choisir quel ville:</p>

 <select name="ville">
  <?php
  $db = new SQLite3('hotel.db');

  $results = $db->query(
    'SELECT DISTINCT "Ville", "CodePostal" FROM hotel ORDER BY "Ville"'
  );

  while ($row = $results->fetchArray()) {
    if ($row[0]) {
        echo "<option value='", $row[1],"'>", $row[0], "</option>\n";
    }
 }
 ?>
 </select>
 
 <br/>

 <p><input type="submit" name="Go" value="Cherche"/></p>

 <br/>
 
 </form>
</body>

</html>
