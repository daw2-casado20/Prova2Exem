<?php
$db = mysqli_connect('localhost', 'adri', 'root') or 
    die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'prova') or die(mysqli_error($db));

$ord = "";
if($_GET["ord"]){
    $ord = $_GET["ord"];
}
if($ord != "DESC"){
    $ord = "DESC";
}else if($ord != "ASC"){
    $ord = "ASC";
}else{
    $ord="ASC";
}
// retrieve reviews for this movie
echo <<<ENDHTML
    <head>
  <title>Music database</title>
  <style type="text/css">
   th { background-color: #999;}
   .odd_row { background-color: #EEE; }
   .even_row { background-color: #FFF; }
  </style>
 </head>
 <body>
 <table style="width:100%;">
  <tr>
   <th colspan="4">ciutat <a href="ciutat.php?action=add">[ADD]</a></th>
  </tr>
  <tr>
   <th>codi</th>
   <th> <a href="admin.php?ord=$ord">nom</a></th>
   <th>poblacio</th>
   <th>accio</th>
   
  </tr>
ENDHTML;
?>

<?php


$query = 'SELECT * FROM Ciutat ORDER BY nom '. $ord;
$result = mysqli_query($db, $query) or die (mysqli_error($db));

$odd = true;
while ($row = mysqli_fetch_assoc($result)) {
    echo ($odd == true) ? '<tr class="odd_row">' : '<tr class="even_row">';
    $odd = !$odd; 
    echo '<td>'; 
    echo $row['codi'];
    echo '</td>';
    echo '<td>'; 
    echo $row['nom'];
    echo '</td>';
    echo '<td>'; 
    echo $row['poblacio'];
    echo '</td>';
    echo '<td>';
    echo ' <a href="ciutat.php?action=edit&id=' . $row['idCiutat'] . '"> [EDIT]</a>'; 
    echo ' <a href="delete.php?type=ciutat&id=' . $row['idCiutat'] . '"> [DELETE]</a>';
    echo '</td></tr>';
}

?>
<?php
 echo <<<ENDHTML
    <head>
  <title>Music database</title>
  <style type="text/css">
   th { background-color: #999;}
   .odd_row { background-color: #EEE; }
   .even_row { background-color: #FFF; }
  </style>
 </head>
 <body>
 <table style="width:100%;">
  <tr>
   <th colspan="8">Temps <a href="temps.php?action=add">[ADD]</a></th>
  </tr>
  <tr>
   <th>nom</th>
   <th>tempAlta</th>
   <th>tempBaixa</th>
   <th>precipitacio</th>
   <th>data</th>
   <th>color</th>
   <th>accio</th>
  </tr>
ENDHTML;
?>

<?php


$query = 'SELECT * FROM Temps';
$result = mysqli_query($db, $query) or die (mysqli_error($db));

$odd = true;
while ($row = mysqli_fetch_assoc($result)) {
    echo ($odd == true) ? '<tr class="odd_row">' : '<tr class="even_row">';
    $odd = !$odd; 
    echo '<td>'; 
    echo $row['cfCiutat'];
    echo '</td>';
    echo '<td>'; 
    echo $row['tempAlta'];
    echo '</td>';
    echo '<td>'; 
    echo $row['tempAlta'];
    echo '</td>';
    echo '<td>'; 
    echo $row['precipitacio'];
    echo '</td>';
    echo '<td>'; 
    echo $row['data'];
    echo '</td>';
     echo '<td>'; 
    echo $row['color'];
    echo '</td>';
    echo '<td>';
    echo ' <a href="temps.php?action=edit&id=' . $row['idTemps'] . '"> [EDIT]</a>'; 
    echo ' <a href="delete.php?type=temps&id=' . $row['idTemps'] . '"> [DELETE]</a>';
    echo '</td></tr>';
}

?>
  </table>
 </body>
</html>

