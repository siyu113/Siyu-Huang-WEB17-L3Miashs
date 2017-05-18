<html>
<head>
   <meta charset="utf-8"/>
     <title>Voilà ces résultats;on trouve</title>
</head>
<body>
<h1> Voilà ces résultats on trouve</h1>
<p><img src="http://roozegaran.com/wp-content/uploads/2016/07/HOTEL_2323685b.jpg"/></p>

<table>
<tr>
<th>Ville</th><th>Nom</th><th>Classement</th><th>Adresse</th><th>Couriel</th><th>SiteWeb</th>
</tr>

<?php
if (array_key_exists('ville', $_GET)) {
    $code=$_GET['ville'];
} else {
    $code=NULL;
}

if (array_key_exists('descr', $_GET)) {
    $description=$_GET['descr'];
} else{
    $description=NULL;
}

if (array_key_exists('offset', $_GET)) {
    $offset = $_GET['offset'];
} else {
    $offset = 0;
}

$query = 'SELECT "Ville", "Nom", "Classement", "Adresse", "Couriel", "SiteWeb"'.
    'FROM hotel WHERE 1 ';

if ($code) {
    $query = $query . 'AND "CodePostal" = \'' . $code . '\' ' ;
}

if ($description) {
    $query = $query . 'AND ( "Type" LIKE \'%' . $description . '%\' ' .
        'OR "Nature" LIKE \'%' . $description . '%\') ';
}

$query = $query . "LIMIT 10 " . "OFFSET " . $offset ;


$db = new SQLite3('hotel.db');
$results = $db->query($query);

while ($row = $results->fetchArray()) {
    echo "<tr>";
    echo "<td>",$row[0],"</td>";
    echo "<td>",$row[1],"</td>";
    echo "<td>",$row[2],"</td>";
    echo "<td>",$row[3],"</td>";
    echo "<td>",$row[4],"</td>";
	echo "<td>",$row[5],"</td>";
    echo "</tr>\n";
}

?>
</table>
</form>

<?php
echo "<a href='resultat.php?";
if ($code) {
    echo 'ville=',$code,'&';
}
if ($description) {
    echo 'descr=',$description,'&';
}
echo 'offset=', intval($offset) - 10;
echo "'>&lt;&lt;</a>";

echo "<a href='resultat.php?";
if ($code) {
    echo 'ville=',$code,'&';
}
if ($description) {
    echo 'descr=',$description,'&';
}
echo 'offset=', intval($offset) + 10;
echo "'>&gt;&gt;</a>";
?>
</body>
</html>
