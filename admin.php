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
   <th colspan="2">ciutat <a href="ciutat.php?action=add">[ADD]</a></th>
  </tr>
  <tr>
   <th>codi</th>
   <th> <a href="admin.php?ord=$ord">nom</a></th>
   <th>poblacio</th>
   <th>accio</th>
   
  </tr>
ENDHTML;
?>
<!--<html>
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
   <th colspan="2">ciutat <a href="ciutat.php?action=add">[ADD]</a></th>
  </tr>
  <tr>
   <th>codi</th>
   <th> <a href="admin.php?ord=$ord">nom</a></th>
   <th>poblacio</th>
   <th>accio</th>
   
  </tr>-->

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

//?>
//  <tr>
//    <th colspan="2">People <a href="people.php?action=add"> [ADD]</a></th>
//  </tr>
//<?php
//$query = 'SELECT * FROM persona';
//$result = mysqli_query($db, $query) or die (mysqli_error($db));
//
//$odd = true;
//while ($row = mysqli_fetch_assoc($result)) {
//    echo ($odd == true) ? '<tr class="odd_row">' : '<tr class="even_row">';
//    $odd = !$odd; 
//    echo '<td style="width: 25%;">'; 
//    echo $row['nombre'];
//    echo '</td><td>';
//    echo ' <a href="people.php?action=edit&id=' . $row['persona_id'] .'"> [EDIT]</a>'; 
//    echo ' <a href="delete.php?type=persona&id=' . $row['persona_id'] . '"> [DELETE]</a>';
//    echo '</td></tr>';
//}
//?>
  </table>
 </body>
</html>

