<?php

if(isset($_POST['Productbutton'])){
  $button = $_POST['Productbutton'];

  include 'db_connection.php';

  //SQL Statements
  $sql = "Select Preis from Produkte where name is '$button' ";
  $endprice += $conn->query($sql);
  $sql = "Select * from Produkte where name is '$button' ";
  $product = $conn->query($sql);

  echo $product;
}
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
     <section class="outer-box_left" id="box-1">
       <form action="generate_cashbox.php">
            <input id="load_data" type="submit" name="load_data" value="load_data" onclick="generatebuttons()" />
        </form>

        <div class="product-box" attribute="">
          <a href="javascript:createCart();" onclick="" id="" class="product">
            INIT
          </a>
        </div>

       <div class="product-box" attribute="">
         <a href="#" onclick="addToCart(1, 'produkt 1', 9.99)" id="product-1" class="product">
           <form method="post">
             <input type="submit" name="Productbutton" value="Laugenbretzel">
           </form>
         </a>
       </div>
       <div class="product-box" attribute="">
         <a href="#" onclick="addToCart(2, 'produkt 2', 9.99)" id="product-2" class="product">
           <form method="post">
             <input type="submit" name="Productbutton" value="Weizen-Mischbrot 250g">
           </form>
         </a>
       </div>
       <div class="product-box" attribute="">
         <a href="#" onclick="addToCart(3, 'produkt 3', 9.99)" id="product-3" class="product">
           <form method="post">
             <input type="submit" name="Productbutton" value="Roggen-Mischbrot 250g">
           </form>
         </a>
       </div>
       <div class="product-box" attribute="">
         <a href="#" onclick="addToCart(1, 'produkt 1', 9.99)" id="product-4" class="product">
           <form method="post">
             <input type="submit" name="Productbutton" value="Gutsherren-Brot 500g">
           </form>
         </a>
       </div>
       <div class="product-box" attribute="">
         <a href="#" onclick="addToCart(1, 'produkt 1', 9.99)" id="product-5" class="product">
           <form method="post">
             <input type="submit" name="Productbutton" value="Kosakenbrot 750 gg">
           </form>
         </a>
       </div>
       <div class="product-box" attribute="">
         <a href="#" onclick="addToCart(1, 'produkt 1', 9.99)" id="product-6" class="product">
           <form method="post">
             <input type="submit" name="Productbutton" value="Laugenbretzel">
           </form>
         </a>
       </div>
       <div class="product-box" attribute="">
         <a href="#" onclick="addToCart(1, 'produkt 1', 9.99)" id="product-7" class="product">
           <form method="post">
             <input type="submit" name="Productbutton" value="Fit-Berrybrot 500g">
           </form>
         </a>
       </div>
       <div class="product-box" attribute="">
         <a href="#" onclick="addToCart(1, 'produkt 1', 9.99)" id="product-8" class="product">
           <form method="post">
             <input type="submit" name="Productbutton" value="Milchbrötchen">
           </form>
         </a>
       </div>
       <div class="product-box" attribute="">
         <a href="#" onclick="addToCart('produkt 1', 9.99)" id="product-9" class="product">
           <form method="post">
             <input type="submit" name="Productbutton" value="FitBerrybrötchen">
           </form>
         </a>
       </div>
       <div class="product-box" attribute="">
         <a href="#" onclick="addToCart('produkt 1', 9.99)" id="product-10" class="product">
           <form method="post">
             <input type="submit" name="Productbutton" value="Hamburgerweck">
           </form>
         </a>
       </div>
       <div class="product-box" attribute="">
         <a href="#" onclick="addToCart('produkt 1', 9.99)" id="product-11" class="product">
           <form method="post">
             <input type="submit" name="Productbutton" value="Mohnweck">
           </form>
         </a>
       </div>
       <div class="product-box" attribute="">
         <a href="#" onclick="addToCart('produkt 1', 9.99)" id="product-12" class="product">
           <form method="post">
             <input type="submit" name="Productbutton" value="Haferkrusti">
           </form>
         </a>
       </div>
       <div class="product-box" attribute="">
         <a href="#" onclick="addToCart('produkt 1', 9.99)" id="product-13" class="product">
           <form method="post">
             <input type="submit" name="Productbutton" value="Partyweck">
           </form>
         </a>
       </div>
       <div class="product-box" attribute="">
         <a href="#" onclick="addToCart('produkt 1', 9.99)" id="product-14" class="product">
           <form method="post">
             <input type="submit" name="Productbutton" value="Laugenstange">
           </form>
         </a>
       </div>
       <div class="product-box" attribute="">
         <a href="#" onclick="addToCart('produkt 1', 9.99)" id="product-15" class="product">
           <form method="post">
             <input type="submit" name="Productbutton" value="Laugenbretzel">
           </form>
         </a>
       </div>
       <div class="product-box" attribute="">
         <a href="#" onclick="addToCart('produkt 1', 9.99)" id="product-16" class="product">
           <form method="post">
             <input type="submit" name="Productbutton" value="Puddingknoten">
           </form>
         </a>
       </div>
       <div class="product-box" attribute="">
         <a href="#" onclick="addToCart('produkt 1', 9.99)" id="product-17" class="product">
           <form method="post">
             <input type="submit" name="Productbutton" value="Schokoschnecke">
           </form>
         </a>
       </div>
       <div class="product-box" attribute="">
         <a href="#" onclick="addToCart('produkt 1', 9.99)" id="product-18" class="product">
           <form method="post">
             <input type="submit" name="Productbutton" value="Schokobrötchen">
           </form>
         </a>
       </div>
       <div class="product-box" attribute="">
         <a href="#" onclick="addToCart('produkt 1', 9.99)" id="product-19" class="product">
           <form method="post">
             <input type="submit" name="Productbutton" value="Rosinenbrötchen">
           </form>
         </a>
       </div>
       <div class="product-box" attribute="">
         <a href="#" onclick="addToCart('produkt 1', 9.99)" id="product-20" class="product">
           <form method="post">
             <input type="submit" name="Productbutton" value="Rosen Puddingkuchen">
           </form>
         </a>
       </div>
       <div class="product-box" attribute="">
         <a href="#" onclick="addToCart('produkt 1', 9.99)" id="product-21" class="product">
           <form method="post">
             <input type="submit" name="Productbutton" value="Nuss Zopf">
           </form>
         </a>
       </div>
       <div class="product-box" attribute="">
         <a href="#" onclick="addToCart('produkt 1', 9.99)" id="product-22" class="product">
           <form method="post">
             <input type="submit" name="Productbutton" value="Laugenbretzel">
           </form>
         </a>
       </div>
       <div class="product-box" attribute="">
         <a href="#" onclick="addToCart('produkt 1', 9.99)" id="product-23" class="product">
           <form method="post">
             <input type="submit" name="Productbutton" value="Laugenbretzel">
           </form>
         </a>
       </div>
       <div class="product-box" attribute="">
         <a href="#" onclick="addToCart('produkt 1', 9.99)" id="product-24" class="product">
           <form method="post">
             <input type="submit" name="Productbutton" value="Laugenbretzel">
           </form>
         </a>
       </div>
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
           <input type="text" id="remove-this remove-input" placeholder="ID des zu entfernenden Produktes..."/>
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
