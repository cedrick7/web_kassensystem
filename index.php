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
  <script type="text/javascript" src="styles.js"></script>
</head>

<body>
  <header>
    <h1>Kassensystem von Cedi und Jerry</h>
  </header>
  <div class="content">
    <section class="outer-box_left" id="box-1">
      <div class="product-box" attribute=""><a href="#" onclick="addToCart('produkt 1', 9.99)" id="product-01" class="product">
          <form   method="post">
            <input type="submit" name="Productbutton" value= "Laugenbretzel">
          </form>
          </a></div>
          <div class="product-box" attribute=""><a href="#" onclick="addToCart('produkt 1', 9.99)" id="product-02" class="product">
              <form   method="post">
                <input type="submit" name="Productbutton" value= "Weizen-Mischbrot 250g">
              </form>
              </a></div>
              <div class="product-box" attribute=""><a href="#" onclick="addToCart('produkt 1', 9.99)" id="product-03" class="product">
                  <form   method="post">
                    <input type="submit" name="Productbutton" value= "Roggen-Mischbrot 250g">
                  </form>
                  </a></div>
                  <div class="product-box" attribute=""><a href="#" onclick="addToCart('produkt 1', 9.99)" id="product-04" class="product">
                      <form   method="post">
                        <input type="submit" name="Productbutton" value= "Gutsherren-Brot 500g">
                      </form>
                      </a></div>
                      <div class="product-box" attribute=""><a href="#" onclick="addToCart('produkt 1', 9.99)" id="product-05" class="product">
                          <form   method="post">
                            <input type="submit" name="Productbutton" value= "Kosakenbrot 750 gg">
                          </form>
                          </a></div>
                          <div class="product-box" attribute=""><a href="#" onclick="addToCart('produkt 1', 9.99)" id="product-06" class="product">
                              <form   method="post">
                                <input type="submit" name="Productbutton" value= "Laugenbretzel">
                              </form>
                              </a></div>
                              <div class="product-box" attribute=""><a href="#" onclick="addToCart('produkt 1', 9.99)" id="product-07" class="product">
                                  <form   method="post">
                                    <input type="submit" name="Productbutton" value= "Fit-Berrybrot 500g">
                                  </form>
                                  </a></div>
                                  <div class="product-box" attribute=""><a href="#" onclick="addToCart('produkt 1', 9.99)" id="product-08" class="product">
                                      <form   method="post">
                                        <input type="submit" name="Productbutton" value= "Milchbrötchen">
                                      </form>
                                      </a></div>
                                      <div class="product-box" attribute=""><a href="#" onclick="addToCart('produkt 1', 9.99)" id="product-09" class="product">
                                          <form   method="post">
                                            <input type="submit" name="Productbutton" value= "FitBerrybrötchen">
                                          </form>
                                          </a></div>
                                          <div class="product-box" attribute=""><a href="#" onclick="addToCart('produkt 1', 9.99)" id="product-10" class="product">
                                              <form   method="post">
                                                <input type="submit" name="Productbutton" value= "Hamburgerweck">
                                              </form>
                                              </a></div>
                                              <div class="product-box" attribute=""><a href="#" onclick="addToCart('produkt 1', 9.99)" id="product-11" class="product">
                                                  <form   method="post">
                                                    <input type="submit" name="Productbutton" value= "Mohnweck">
                                                  </form>
                                                  </a></div>
                                                  <div class="product-box" attribute=""><a href="#" onclick="addToCart('produkt 1', 9.99)" id="product-12" class="product">
                                                      <form   method="post">
                                                        <input type="submit" name="Productbutton" value= "Haferkrusti">
                                                      </form>
                                                      </a></div>
                                                      <div class="product-box" attribute=""><a href="#" onclick="addToCart('produkt 1', 9.99)" id="product-13" class="product">
                                                          <form   method="post">
                                                            <input type="submit" name="Productbutton" value= "Partyweck">
                                                          </form>
                                                          </a></div>
                                                          <div class="product-box" attribute=""><a href="#" onclick="addToCart('produkt 1', 9.99)" id="product-14" class="product">
                                                              <form   method="post">
                                                                <input type="submit" name="Productbutton" value= "Laugenstange">
                                                              </form>
                                                              </a></div>
                                                              <div class="product-box" attribute=""><a href="#" onclick="addToCart('produkt 1', 9.99)" id="product-15" class="product">
                                                                  <form   method="post">
                                                                    <input type="submit" name="Productbutton" value= "Laugenbretzel">
                                                                  </form>
                                                                  </a></div>
                                                                  <div class="product-box" attribute=""><a href="#" onclick="addToCart('produkt 1', 9.99)" id="product-16" class="product">
                                                                      <form   method="post">
                                                                        <input type="submit" name="Productbutton" value= "Puddingknoten">
                                                                      </form>
                                                                      </a></div>
                                                                      <div class="product-box" attribute=""><a href="#" onclick="addToCart('produkt 1', 9.99)" id="product-17" class="product">
                                                                          <form   method="post">
                                                                            <input type="submit" name="Productbutton" value= "Schokoschnecke">
                                                                          </form>
                                                                          </a></div>
                                                                          <div class="product-box" attribute=""><a href="#" onclick="addToCart('produkt 1', 9.99)" id="product-18" class="product">
                                                                              <form   method="post">
                                                                                <input type="submit" name="Productbutton" value= "Schokobrötchen">
                                                                              </form>
                                                                              </a></div>
                                                                              <div class="product-box" attribute=""><a href="#" onclick="addToCart('produkt 1', 9.99)" id="product-19" class="product">
                                                                                  <form   method="post">
                                                                                    <input type="submit" name="Productbutton" value= "Rosinenbrötchen">
                                                                                  </form>
                                                                                  </a></div>
                                                                                  <div class="product-box" attribute=""><a href="#" onclick="addToCart('produkt 1', 9.99)" id="product-20" class="product">
                                                                                      <form   method="post">
                                                                                        <input type="submit" name="Productbutton" value= "Rosen Puddingkuchen">
                                                                                      </form>
                                                                                      </a></div>
                                                                                      <div class="product-box" attribute=""><a href="#" onclick="addToCart('produkt 1', 9.99)" id="product-21" class="product">
                                                                                          <form   method="post">
                                                                                            <input type="submit" name="Productbutton" value= "Nuss Zopf">
                                                                                          </form>
                                                                                          </a></div>
                                                                                          <div class="product-box" attribute=""><a href="#" onclick="addToCart('produkt 1', 9.99)" id="product-22" class="product">
                                                                                              <form   method="post">
                                                                                                <input type="submit" name="Productbutton" value= "Laugenbretzel">
                                                                                              </form>
                                                                                              </a></div>
                                                                                              <div class="product-box" attribute=""><a href="#" onclick="addToCart('produkt 1', 9.99)" id="product-23" class="product">
                                                                                                  <form   method="post">
                                                                                                    <input type="submit" name="Productbutton" value= "Laugenbretzel">
                                                                                                  </form>
                                                                                                  </a></div>
                                                                                                  <div class="product-box" attribute=""><a href="#" onclick="addToCart('produkt 1', 9.99)" id="product-24" class="product">
                                                                                                      <form   method="post">
                                                                                                        <input type="submit" name="Productbutton" value= "Laugenbretzel">
                                                                                                      </form>
                                                                                                      </a></div>
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
      <div class="checkout-box">
        <a href="" id="sumbit">zur Kasse gehen</a>
      </div>
      <div class="calculator calc-page">
        <form name="calculator" id="calculator">
          <input type="text" id="screen" name="screen" placeholder="0" disabled readonly>
          <div class="calc-operators">
            <input type="button" class="key operator" id="add" value="+" onclick="display_on_screen('+')">
            <input type="button" class="key number" id="sub" value="–" onclick="display_on_screen('-')">
            <input type="button" class="key number" id="mult" value="×" onclick="display_on_screen('*')">
            <input type="button" class="key number" id="div" value="÷" onclick="display_on_screen('/')">
          </div>
          <div class="keys">
            <div class="row-numbers">
              <input type="button" class="key number" id="one" value="1" onclick="display_on_screen('1')">
              <input type="button" class="key number" id="two" value="2" onclick="display_on_screen('2')">
              <input type="button" class="key number" id="three" value="3" onclick="display_on_screen('3')">
            </div>
            <div class="row-numbers">
              <input type="button" class="key number" id="four" value="4" onclick="display_on_screen('4')">
              <input type="button" class="key number" id="five" value="5" onclick="display_on_screen('5')">
              <input type="button" class="key number" id="six" value="6" onclick="display_on_screen('6')">
            </div>
            <div class="row-numbers">
              <input type="button" class="key number" id="seven" value="7" onclick="display_on_screen('7')">
              <input type="button" class="key number" id="eight" value="8" onclick="display_on_screen('8')">
              <input type="button" class="key number" id="nine" value="9" onclick="display_on_screen('9')">
            </div>
            <div class="row-numbers">
              <input type="button" class="key number" id="decimal" value="." onclick="display_on_screen('.')">
              <input type="button" class="key number" id="zero" value="0" onclick="display_on_screen('0')">
              <button type="button" class="key number" id="clear" value=" " onclick="clear_screen()">Del</button>
            </div>
            <div class="key result" id="result" onclick="calculate_the_result()">
              <span>=</span>
            </div>
          </div>
        </form>
      </div>
    </section>
  </div>

  <footer>
    <hr>
    </hr>
    <p><span class="footer_item">Copyright 2020</span><span class="footer_item">Kontakt <span class="style_as_link">hier</span>.</span><span class="footer_item">Impressum <span class="style_as_link">hier</span>.</span><span
        class="footer_item">Datenschutzhinweise <span class="style_as_link">hier</span>.</span></p>
  </footer>
</body>

</html>
