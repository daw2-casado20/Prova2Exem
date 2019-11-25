<?php
$db = mysqli_connect('localhost', 'adri', 'root') or 
    die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'prova') or die(mysqli_error($db));

if ($_GET['action'] == 'edit') {
    //retrieve the record's information 
    $query = 'SELECT * FROM Ciutat WHERE idCiutat = ' . $_GET['id'];
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    extract(mysqli_fetch_assoc($result));
} else {
    //set values to blank
    $nom = '';
    $codi = '';
    $poblacio = 0;
}
?>
<html>
 <head>
  <title><?php echo ucfirst($_GET['action']); ?> Movie</title>
 </head>
 <body>
  <form action="commit.php?action=<?php echo $_GET['action']; ?>&type=ciutat" method="post">
   <table>
    <tr>
     <td>Nombre de la ciudad</td>
     <td><input type="text" name="nom" value="<?php echo $nom; ?>"/></td>
    </tr>
    <td>Codigo de la ciudad</td>
     <td><input type="text" name="codi" value="<?php echo $codi; ?>"/></td>
    </tr>
    <tr>
     <td>Poblacio</td>
     <td><input type="text" name="poblacio" value="<?php echo $poblacio; ?>"/></td>
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
    echo '<input type="hidden" value="' . $_GET['id'] . '" name="idCiutat" />';
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

