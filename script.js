/* Vollbildmodus -------------------------------------------------------------*/
// In den Vollbildmodus wechseln
function enterFullscreen(element) {
  if (element.requestFullscreen) {
    element.requestFullscreen();
  } else if (element.mozRequestFullScreen) {
    element.mozRequestFullScreen();
  } else if (element.msRequestFullscreen) {
    element.msRequestFullscreen();
  } else if (element.webkitRequestFullscreen) {
    element.webkitRequestFullscreen();
  }

  document.getElementById("fullscreen-on").style.display = "none";
  document.getElementById("fullscreen-off").style.display = "inline-block";
}

// Den Vollbildmodus verlassen
function exitFullscreen() {
  if (document.exitFullscreen) {
    document.exitFullscreen();
  } else if (document.mozCancelFullScreen) {
    document.mozCancelFullScreen();
  } else if (document.webkitExitFullscreen) {
    document.webkitExitFullscreen();
  }

  document.getElementById("fullscreen-off").style.display = "none";
  document.getElementById("fullscreen-on").style.display = "inline-block";
}

/* Taschenrechner ------------------------------------------------------------*/
// angeklickte Werte zum TR-Display hinzufügen
function addToScreen(x) {
  var box = document.getElementById("calc-display");
  box.value += x;

  // falls man "c" gedrückt hat, das TR-Display zurücksetzen
  if (x == 'c') {
    box.value = '';
  }
}

// Ergebnis errechnen
function result() {
  var box = document.getElementById("calc-display");

  x = box.value;
  x = eval(x);
  box.value = x;
}

// Letzten Wert des TR-Displays löschen
function backspace() {
  var box = document.getElementById("calc-display");

  var number = box.value;
  var len = number.length - 1;
  var newnumber = number.substring(0, len);
  box.value = newnumber;
}

/* Warenkorb, Rechnung -------------------------------------------------------*/
// Warenkorb initialisieren
function createCart() {
  document.getElementById("fullscreen-off").style.display = "none";
  document.getElementById("fullscreen-on").style.display = "inline-block";
  // produkt aus warenkorb entfernen button unanklickbar machen
  document.getElementById("remove-button").disabled = true;
  //document.getElementById("remove-input").disabled = true;

  // local storage leeren
  localStorage.clear();

  // array für ausgewählte produkte erstellen
  // [Quantität, Produktid, Produktname, Produktpreis]
  var cart = [
    [0, 0, "Keine Produkte ausgewählt!", 0.00]
  ]

  // warenkorb als localStorage speichern
  localStorage["cart"] = JSON.stringify(cart);
  // // oder mit:
  // var cart_serialized = JSON.strinigy(cart);
  // localStorage.setItem("cart", cart_serialized);
  // // und andersrum:
  // let cart_deserialized = JSON.parse(localStorage.getItem("cart"));
  // console.log(cart_deserialized);
}

// Produkte zum Warenkorb hinzufügen
function addToCart(product_id, product_name, product_price) {
  // warenkorb aus localStorage laden
  var cart = JSON.parse(localStorage["cart"]);

  // Hilfsvariablen definieren
  var exists = false;
  var pos = 0;

  console.log("");
  for (var i = 0; i < cart.length; i++) {
    console.log(i + ": product-quant: " + cart[i][0] + ", product-id: " + cart[i][1] + ", product-price: " + cart[i][3]);
  }

  // ausgewählte produkte zum array hinzufügen
  for (var i = 0; i < cart.length; i++) {
    if (cart[i][1] == product_id) {
      exists = true;
      pos = i;
      break;
    } else {
      exists = false;
    }
  }

  switch (exists) {
    case true:
      cart[pos][0] += 1;
      cart[pos][3] += product_price;
      cart[pos][3] = Math.round((cart[pos][3]) * 100) / 100;
      cart[pos][3].toFixed(2);
      break;
    case false:
      cart.push([1, product_id, product_name, product_price]);
      break;
  }

  // warenkorb als localStorage speichern
  localStorage["cart"] = JSON.stringify(cart);

  getCart(); // warenkorb aktualisieren
  overrideResult(product_price, "+"); // gesamtpreis aktualisieren
}

// Produkt aus warenkorb löschen
function deleteCardItem() {
  // produkt-id filtern
  var product_id_str = document.getElementById("remove-this").value;
  var product_id = Number(product_id_str.replace(/[^0-9.-]+/g, ""));

  // warenkorb aus localStorage laden
  var cart = JSON.parse(localStorage["cart"]);

  // Hilfsvariablen definieren
  var product_id_found = false;

  // im warenkorb nach produkt-id suchen und
  // warenkorb-position und preis aus zu löschendem produkt filtern
  for (var i = 0; i < cart.length; i++) {
    if (cart[i][1] == product_id) {
      var product_quantity = cart[i][0];
      var product_price = cart[i][3];
      product_price = (Math.round((product_price) * 100) / 100).toFixed(2);
      //product_price.toFixed(2);
      product_id_found = true;

      // überprüfen ob preis gefiltert wird
      if (product_price == null) {
        console.error("no price found! " + product_price);
      }

      if (cart[i][0] == 1) {
        // produkt aus warenkorb entfernen
        for (var k = 0; k < cart.length; k++) {
          if (cart[k][1] == product_id) {
            cart.splice(k, 1);
            break; // produkt gefunden, also suche abbrechen
          }
        }
      } else if (cart[i][0] > 1) {
        // Preis anpassen und Quantität um eins reduzieren
        product_price = cart[i][3] / cart[i][0];
        cart[i][3] = cart[i][3] / cart[i][0];
        product_price = (Math.round((product_price) * 100) / 100).toFixed(2);
        cart[i][3].toFixed(2);
        cart[i][0] -= 1;
      }

      // warenkorb als localStorage speichern
      localStorage["cart"] = JSON.stringify(cart);

      getCart(); // warenkorb aktualisieren
      overrideResult(product_price, "-"); // gesamtpreis aktualisieren
      break; // suchen stoppen, weil schon gefunden
    }
  }

  if (product_id_found == false) {
    console.error("product-id " + product_id + " not in card!");
    overrideResult(0.00, "x"); // gesamtpreis aktualisieren
  }

  // produkt-id-eingabe aus dem input-feld löschen
  document.getElementById("remove-this").value = "";
}

// Warenkorb anzeigen
function getCart() {
  // finde alle wichtigen Elemente
  var list = document.getElementById("product-list");

  // bisherigen warenkorb-inhalt löschen
  while (list.firstChild) {
    list.removeChild(list.firstChild);
  }

  // warenkorb aus localStorage laden
  var cart = JSON.parse(localStorage["cart"]);

  // ausgewählte produkte zum warenkorb hinzufügen und gesamtpreis anpassen
  for (var i = 1; i < cart.length; i++) {
    var productQuantity = (cart[i][0]).toString();
    var productId = cart[i][1];
    var productName = cart[i][2];
    var productPrice = ((cart[i][3]).toFixed(2)).toString();
    var product = productQuantity + "x " + productName + "  –  " + productPrice + "€ (id: " + productId + ")";
    var price_result = cart[i][3];

    // erstelle ein neues Element li, das später in unsere Liste aufgenommen wird
    var item = document.createElement("li");

    // erstelle eine Textstelle für unser Element und trage den Wert unseres Inputs
    item.appendChild(document.createTextNode(product));

    // Element zu der Liste hinzufügen
    list.appendChild(item);
  }
}

// Gesamtpreis anpassen
function overrideResult(price, operator) {
  // finde alle wichtigen Elemente
  //var result = document.getElementById("price_result");

  // werte der produkte herausfinden und in variablen speichern
  var price_result_str = (document.getElementById("price_result").innerHTML).toString();
  var price_result = Number(price_result_str.replace(/[^0-9.-]+/g, ""));

  // gesamtpreis anpassen
  if (operator == "+") {
    document.getElementById("price_result").innerHTML = (Math.round((price_result + price) * 100) / 100).toFixed(2);
    document.getElementById("remove-button").disabled = false;
    //document.getElementById("remove-input").disabled = false;
  } else if (operator == "-") {
    document.getElementById("price_result").innerHTML = (Math.round((price_result - price) * 100) / 100).toFixed(2);
    var price_result_str = (document.getElementById("price_result").innerHTML).toString();
    var price_result = Number(price_result_str.replace(/[^0-9.-]+/g, ""));
    if (price_result == 0 | price_result == null) {
      document.getElementById("remove-button").disabled = true;
      //document.getElementById("remove-input").disabled = true;
    } else {
      document.getElementById("remove-button").disabled = false;
      //document.getElementById("remove-input").disabled = false;
    }
  } else {
    var price_result_str = (document.getElementById("price_result").innerHTML).toString();
    var price_result = Number(price_result_str.replace(/[^0-9.-]+/g, ""));
    if (price_result == 0 | price_result == null) {
      document.getElementById("remove-button").disabled = true;
      //document.getElementById("remove-input").disabled = true;
    } else {
      document.getElementById("remove-button").disabled = false;
      //document.getElementById("remove-input").disabled = false;
    }
  }
}

// Rechnung erstellen (+ drucken)
function generateBill() {
  document.getElementById("fullscreen-off").style.display = "none";
  document.getElementById("fullscreen-on").style.display = "inline-block";

  // warenkorb in variable speichern
  var result = (document.getElementById("price_result").innerHTML).toString();

  var cartContent = document.getElementById("product-list").innerHTML;
  sessionStorage.setItem("copyCartContent", cartContent);

  // warenkorb in neuem fenster öffnen (+ zeit und option "drucken" hinzufügen)
  var bill = window.open("");
  bill.document.write("<!DOCTYPE html><html lang='de' dir='ltr'><head><meta charset='utf-8'/><title>bill</title></head><body style='text-align:center;'><p>Rechnung vom <span id='date'></span><script>var today = new Date(); document.getElementById('date').innerHTML = today;</script><ul id='createdBill' style='list-style-type:none;'>" + sessionStorage.getItem('copyCartContent') + "</ul><br></br><p>Gesamt: " + result + "€</p><br></br><button onclick='window.print()' style='background-color:#dddada;color: #000;text-align: center;text-decoration: none;padding: 10px;'>Rechnung drucken</button></body></html>");
}

// Wert aus dem TR zum Warenkorb
function calculatorToCart() {
  var box = document.getElementById("calc-display");
  boxValue = Number(box.value.replace(/[^0-9.-]+/g, ""));
  var id = 99999;
  var name = "Wert aus dem Taschenrechner";

  addToCart(id, name, boxValue);
}