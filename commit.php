<?php
$db = mysqli_connect('localhost', 'adri', 'root') or 
    die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'prova') or die(mysqli_error($db));
?>
<html>
 <head>
  <title>Commit</title>
 </head>
 <body>
<?php
switch ($_GET['action']) {
case 'add':
    switch ($_GET['type']) {
    case 'ciutat':
        $query = 'INSERT INTO Ciutat (codi, nom, poblacio) VALUES ("' . $_POST['codi'] . '", "' . $_POST['nom'] . '", ' . $_POST['poblacio'] . ')';
        break;
    case 'temps':
        $query = 'INSERT INTO Temps (cfCiutat, tempAlta, tempBaixa, precipitacio, data, color) VALUES (' . $_POST['cfCiutat'] . ', ' . $_POST['tempAlta'] . ', ' . $_POST['tempBaixa'] . ' , ' . $_POST['precipitacio'] . ', "' . $_POST['data'] . '", ' . $_POST['color'] . ')';
        break;
    }
    break;          
   
case 'edit':
    switch ($_GET['type']) {
    case 'ciutat':
        $query = 'UPDATE Ciutat SET codi = "' . $_POST['codi'] . '", nom = "' . $_POST['nom'] . '", poblacio = ' . $_POST['poblacio'] . ' WHERE idCiutat = ' . $_POST['idCiutat'];

        break;
    case 'temps':
        $query = 'UPDATE Temps SET cfCiutat = "' . $_POST['cfCiutat'] . '", tempAlta = "' . $_POST['tempAlta'] . '", tempBaixa = ' . $_POST['tempBaixa'] . ', precipitacio = ' . $_POST['precipitacio'] . ', data = "' . $_POST['data'] . '", color = ' . $_POST['color'] . '  WHERE idTemps = ' . $_POST['idTemps'];

        break;
    }
    break;
    }


if (isset($query)) {
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
}
?>
  <p>Done!</p>
 </body>
</html>



