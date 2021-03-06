<?php
session_start();

if(!isset($_SESSION['user'])) {
  header("Location: login.php");
  exit;
}

// datenbankverbindung
$conn = new mysqli("localhost:8889","root","root","cashbox");

$sql = "SELECT * FROM product";
$stmt = $conn->prepare($sql);
$stmt->execute();

$result = $stmt->get_result();

//daten container
$product_arr = Array();

//packen alle daten in array
while ($row = $result->fetch_assoc()) {
    $product_arr[] = $row;
}

$stmt->close();

$sql = "SELECT * FROM productcategory";
$stmt = $conn->prepare($sql);
$stmt->execute();

$result = $stmt->get_result();

//daten container
$category_arr = Array();

//packen alle daten in array
while ($row = $result->fetch_assoc()) {
    $category_arr[] = $row;
}

$stmt->close();

if(isset($_GET['category'])){

  $sql = "SELECT p.id, p.price, p.name, p.category FROM product AS p
          INNER JOIN productcategory AS c
          ON p.category = c.ID AND c.ID = ?";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i",$_GET['category']);
  $stmt->execute();

  $result = $stmt->get_result();

  //daten container
  $product_arr = Array();

  //packen alle daten in array
  while ($row = $result->fetch_assoc()) {
      $product_arr[] = $row;
  }
}
 ?>

 <!DOCTYPE html>
 <html lang="de" dir="ltr">

 <head>
   <meta charset="utf-8" />
   <title>Kassensystem</title>
   <link rel="stylesheet" href="styles.min.css" />
   <script type="text/javascript" src="script.js"></script>
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">

 </head>

 <body>

   <header>
   <h1>Kassensystem von Cedrick Candia Ferreira und Jeremy Fuchs</h1>
   <a class="logout" href="logout.php">logout <i class="fas fa-sign-out-alt"></i></a>
   </header>
   <div class="content">
     <section class="outer-box_left" id="category_filter">
       <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="get" style="margin-left: 20px;">
           <?php foreach($category_arr as $category) { ?>
        <input type="radio" name="category" style="margin-left: 20px;" value="<?php echo $category['id']; ?>"
         id="<?php echo $category['id']; ?>" <?php if(!empty($_GET['category'])) if($_GET['category'] == $category['id']) echo "checked"?> />
        <label for="<?php echo $category['id']; ?>" style="display:inline"><?php echo $category['name']; ?></label>
        <?php } ?>
        <input type="submit" value="Filtern..." style="margin-left: 20px;">
      </form>
     </section>

     <section class="outer-box_right" id="set-screen-option">
         <button class="set-screenbutton" id="fullscreen-on" onclick="enterFullscreen(document.documentElement)">Den Vollbildmodus starten <i class="fas fa-expand-alt"></i></button>
         <button class="set-screen-button" id="fullscreen-off" onclick="exitFullscreen()">Den Vollbildmodus verlassen <i class="fas fa-compress-alt"></i></button>
     </section>
   </div>
   <div class="content">
     <section class="outer-box_left" id="box-1">
       <?php foreach ($product_arr as $product) {
            // $id = $product['id'];
            // $name = $product['name'];
            // $price = $product['price'];
        ?>
       <div class="product-box" attribute="">
             <a
             id="product-<?php echo $product['id']; ?>"
             class="product-button"
             name="Productbutton"
             onclick="return addToCart(<?php echo $product['id']; ?>, '<?php echo $product['name']; ?>', <?php echo $product['price']; ?>);" >
             <?php echo $product['name']; ?> </a>
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
           <input type="text" id="remove-this" placeholder="ID des zu entfernenden Produktes..."/>
           <input type="button" id="remove-button" onclick="deleteCardItem()" value="Entfernen"/>
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
           <input type="button" class="keys"  value="0" onclick="addToScreen('0')" />
           <input type="button" class="keys" value="." onclick="addToScreen('.')" />
           <input type="button" class="equal" id="key-result" value="=" onclick="result()" />
           <a id="toCart" class="keys" onclick="return calculatorToCart();"><i class="fas fa-shopping-cart"></i></a>
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
   <script>createCart();</script>
 </body>

 </html>
