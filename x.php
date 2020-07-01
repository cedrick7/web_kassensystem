<?php
//verbindung
$conn = new mysqli("localhost:8889","root","root","cashbox");

$sql = "SELECT * FROM product";
$stmt = $conn->prepare($sql);
$stmt->execute();

$result = $stmt->get_result();

//daten container
$produkte_arr = Array();

//packen alle daten in array
while ($row = $result->fetch_assoc())
{

    $produkte_arr[] = $row;

}

// echo "<pre>";
// var_dump($produkte_arr);
// $stmt->close();
// die();

$stmt->close();


$sql = "SELECT * FROM productcategory";
$stmt = $conn->prepare($sql);
$stmt->execute();

$result = $stmt->get_result();

//daten container
$kategories_arr = Array();

//packen alle daten in array
while ($row = $result->fetch_assoc())
{

    $kategories_arr[] = $row;

}

$stmt->close();

if(isset($_GET['kategorie'])){

  $sql = "SELECT * FROM product AS p INNER JOIN productcategory AS k
       ON p.category = k.ID AND k.ID = ?";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i",$_GET['kategorie']);
  $stmt->execute();

  $result = $stmt->get_result();

  //daten container
  $produkte_arr = Array();

  //packen alle daten in array
  while ($row = $result->fetch_assoc())
  {

      $produkte_arr[] = $row;

  }
}
 //echo "<pre>";
 //var_dump($produkte_arr);
//die();

 ?>

<!DOCTYPE html>
<html lang="de" dir="ltr">

<head>
  <meta charset="utf-8" />
  <title>Kassensystem</title>
  <link rel="stylesheet" href="styles.min.css" />
  <script type="text/javascript" src="script.js"></script>
</head>

<body>
  <header>
    <h1>Kassensystem von Cedi und Jerry</h1>
    <div>
      <div class="change_view">
        <button id="fullscreen_on" onclick="enterFullscreen(document.documentElement)">Den Vollbildmodus starten <i class="fas fa-expand-alt"></i></button>
        <button id="fullscreen_off" onclick="exitFullscreen()">Den Vollbildmodus verlassen <i class="fas fa-compress-alt"></i></button>
      </div>
    </div>
  </header>
  <div class="content">

    <div style="margin-left: 20px;">
      <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="get">
        <?php foreach($kategories_arr as $kategorie) { ?>
        <input type="radio" name="kategorie" value="<?php echo $kategorie['ID']; ?>" id="<?php echo $kategorie['ID']; ?>" <?php if($_GET['kategorie'] == $kategorie['ID']) echo "checked"?>>
        <label for="<?php echo $kategorie['ID']; ?>" style="display:inline"><?php echo $kategorie['Kategoriename']; ?></label>
        <?php } ?>
        <input type="submit" value="senden">
      </form>
    </div>


    <section class="outer-box_left" id="box-1">

      <?php foreach ($produkte_arr as $produkt) {
            $id = $produkt['ID'];
            $produktname = $produkt['Produktname'];
            $preis = $produkt['Preis'];
         ?>

      <div class="product-box" attribute="">
        <a href="#" onclick="addToCart(<?php echo $id ?>, '<?php echo $produktname; ?>', <?php echo $preis; ?>)" id="product-<?php echo $id ?>" class="product">
          <form method="post">
            <input type="submit" name="Productbutton" value="<?php echo $produkt['Produktname'] ?>">
          </form>
        </a>
      </div>
      <?php } ?>

    </section>
    <section class="outer-box_right" id="box-2">
      <div class="product-cart">
        <ul id="product-list">
          <li id="product-list_placeholder-item"></li>
        </ul>
      </div>
      <div class="sum-list">
        <p>Preis Gesamt = <span id="price_result">0.00</span>€</p>
      </div>
      <div class="remove-listItem">
        <form>
          <input type="text" id="remove-this" placeholder="ID des zu entfernenden Produktes..." />
          <input type="button" id="remove-button" onclick="deleteCardItem()" value="Entfernen" />
        </form>
      </div>
      <div class="checkout-box">
        <a href="javascript:generateBill()" id="saveBill">Rechnung erstellen</a>
        <a href="" id="sumbit">zur Kasse gehen</a>
      </div>
      <div class="calculator">
        <form>
          <input type="text" id="calc-display" />
          <br></br>
          <input type="button" class="keys" value="7" onclick="addToScreen('7')" />
          <input type="button" class="keys" value="8" onclick="addToScreen('8')" />
          <input type="button" class="keys" value="9" onclick="addToScreen('9')" />
          <input type="button" class="keys" value="C" onclick="addToScreen('c')" />
          <input type="button" class="keys" value="CE" onclick="backspace()" />
          <br></br>
          <input type="button" class="keys" value="4" onclick="addToScreen('4')" />
          <input type="button" class="keys" value="5" onclick="addToScreen('5')" />
          <input type="button" class="keys" value="6" onclick="addToScreen('6')" />
          <input type="button" class="keys" value="*" onclick="addToScreen('*')" />
          <input type="button" class="keys" value="/" onclick="addToScreen('/')" />
          <br></br>
          <input type="button" class="keys" value="1" onclick="addToScreen('1')" />
          <input type="button" class="keys" value="2" onclick="addToScreen('2')" />
          <input type="button" class="keys" value="3" onclick="addToScreen('3')" />
          <input type="button" class="keys" value="+" onclick="addToScreen('+')" />
          <input type="button" class="keys" value="-" onclick="addToScreen('-')" />
          <br></br>
          <input type="button" class="keys" id="key-zero" value="0" onclick="addToScreen('0')" />
          <input type="button" class="keys" value="." onclick="addToScreen('.')" />
          <input type="button" class="equal" id="key-result" value="=" onclick="result()" />
        </form>
      </div>
    </section>
  </div>

  <footer>
    <hr>
    </hr>
    <p><span class="footer_item">Copyright 2020</span><span class="footer_item">Kontakt <a class="style_as_link" href="contact.html">hier</a>.</span><span class="footer_item">Impressum <span class="style_as_link">hier</span>.</span><span
        class="footer_item">Datenschutzhinweise <span class="style_as_link">hier</span>.</span></p>
  </footer>
</body>

</html>
