<?php
$db = mysqli_connect('localhost', 'adri', 'root') or 
    die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'prova') or die(mysqli_error($db));

if ($_GET['action'] == 'edit') {
    //retrieve the record's information 
    $query = 'SELECT * FROM Temps WHERE idTemps = ' . $_GET['id'];
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    extract(mysqli_fetch_assoc($result));
} else {
    //set values to blank
    $cfCiutat = 0;
    $tempAlta = 0;
    $tempBaixa = 0;
    $precipitacio = 0;
    $data = date('Y');
    $color = 0;
}
?>
<html>
 <head>
  <title><?php echo ucfirst($_GET['action']); ?> Movie</title>
 </head>
 <body>
  <form action="commit.php?action=<?php echo $_GET['action']; ?>&type=temps" method="post">
   <table>
    <tr>
     <td>Nombre</td>
     <td><select name="cfCiutat">
    <?php
// select the movie type information
$query = 'SELECT
        idCiutat, nom
    FROM
        ciutat
    ORDER BY
        nom';
$result = mysqli_query($db, $query) or die(mysqli_error($db));
// populate the select options with the results
while ($row = mysqli_fetch_assoc($result)) {
    
        if ($row['idCiutat'] == $cfCiutat) {
            echo '<option value="' . $row['idCiutat'] .
                '" selected="selected">';
        } else {
            echo '<option value="' . $row['idCiutat'] . '">';
        }
        echo $row['nom'] . '</option>';
    
}
?>
    </select></td>
    </tr>
    <td>Temperatura mas alta</td>
     <td><input type="text" name="tempAlta" value="<?php echo $tempAlta; ?>"/></td>
    </tr>
    <tr>
     <td>Temperatura mas baja</td>
     <td><input type="text" name="tempBaixa" value="<?php echo $tempBaixa; ?>"/></td>
    </tr>
    <tr>
     <td>Precipitaciones</td>
     <td><input type="text" name="precipitacio" value="<?php echo $precipitacio; ?>"/></td>
    </tr>
    <tr>
     <td>Fecha</td>
     <td><input type="text" name="data" value="<?php echo $data; ?>"/></td>
    </tr>
    <tr>
     <td>Color</td>
     <td><input type="text" name="color" value="<?php echo $color; ?>"/></td>
    </tr>
<?php
//// select the movie type information
//$query = 'SELECT * FROM Ciutat ORDER BY nom';
//$result = mysqli_query($db, $query) or die(mysqli_error($db));
//
//// populate the select options with the results
//while ($row = mysqli_fetch_assoc($result)) {
//    
//        if ($row['nom'] == $ciutat) {
//            echo '<option value="' . $row['idCiutat'] . '" selected="selected">';
//        } else {
//            echo '<option value="' . $row['idCiutat'] . '">';
//        }
//        echo $row['nom'] . '</option>';
//    
//}
//
//?>
    <tr>
     <td colspan="2" style="text-align: center;">
<?php
if ($_GET['action'] == 'edit') {
    echo '<input type="hidden" value="' . $_GET['id'] . '" name="idTemps" />';
}
?>
      <input type="submit" name="submit"
       value="<?php echo ucfirst($_GET['action']); ?>" />
     </td>
    </tr>
   </table>
  </form>
 </body>
</html>

