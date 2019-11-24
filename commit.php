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
    }
    break;
case 'edit':
    switch ($_GET['type']) {
    case 'ciutat':
        $query = 'UPDATE Ciutat SET codi = "' . $_POST['codi'] . '", nom = "' . $_POST['nom'] . '", poblacio = ' . $_POST['poblacio'] . ' WHERE idCiutat = ' . $_POST['idCiutat'];

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



