<?php
function generatebuttons()
{
 include 'db_connection.php';
 $sql = "SELECT COUNT(ID) FROM Produkte";
 $productid = $conn->query($sql);
 $id = 1;
  while ($id <= $productid)
  {
    $sql = "SELECT Produktname FROM Produkte WHERE ID = '$id'";
    $sql2 = "SELECT Preis FROM Produkte WHERE ID = '$id'";
   $button_name = $conn->query($sql);
   $button_preis = $conn->query($sql2);

    echo '<div class="product-box">
            <a href="#" onclick="addToCart(''<?=$button_name?>'', <?=$button_preis?>)" id="product-<?=$id?>" class="product">
              <form method="post">
                <input type="submit" name="Productbutton-<?=$id?>" value= "<?=$button_name?>" />
              </form>
            </a>
          </div>';

$id = $id + 1;
  }
}
?>
