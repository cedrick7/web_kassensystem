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

  document.getElementById("fullscreen_on").style.display = "none";
  document.getElementById("fullscreen_off").style.display = "block";
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

  document.getElementById("fullscreen_off").style.display = "none";
  document.getElementById("fullscreen_on").style.display = "block";
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
  // produkt aus warenkorb entfernen button unanklickbar machen
  document.getElementById("remove-button").disabled = true;
  //document.getElementById("remove-input").disabled = true;

  // array für ausgewählte produkte erstellen
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

  // ausgewählte produkte zum array hinzufügen
  cart.push([1, product_id, product_name, product_price]);

  // warenkorb als localStorage speichern
  localStorage["cart"] = JSON.stringify(cart);

  getCart(); // warenkorb aktualisieren
  overrideResult(product_price, "+"); // gesamtpreis aktualisieren
}

// produkt aus warenkorb löschen
function deleteCardItem() {
  // produkt-id filtern
  var product_id_str = document.getElementById("remove-this").value;
  var product_id = Number(product_id_str.replace(/[^0-9.-]+/g, ""));

  // warenkorb aus localStorage laden
  var cart = JSON.parse(localStorage["cart"]);

  // im warenkorb nach produkt-id suchen und
  // warenkorb-position und preis aus zu löschendem produkt filtern
  var product_id_found = false;
  for (var i = 0; i <= cart.length - 1; i++) {
    if (cart[i][1] == product_id) {
      var product_position = cart[i][0];
      var product_price = cart[i][3];
      product_id_found = true;

      // überprüfen ob preis gefiltert wird
      if (product_price == null) {
        console.error("no price found! " + product_price);
      }

      // produkt aus warenkorb entfernen
      for (var i = 0; i <= cart.length - 1; i++) {
        if (cart[i][1] == product_id) {
          cart.splice(i, 1);
          break; // produkt gefunden, also suche abbrechen
        }
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

// warenkorb anzeigen
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
  for (var i = 1; i <= cart.length - 1; i++) {
    var productCount = (cart[i][0]).toString();
    var productId = cart[i][1];
    var productName = cart[i][2];
    var productPrice = (cart[i][3]).toString();
    var product = productName + "  –  " + productPrice + "€       (id:" + productId + ")";
    console.log(product);
    var price_result = cart[i][3];

    // erstelle ein neues Element li, das später in unsere Liste aufgenommen wird
    var item = document.createElement("li");

    // erstelle eine Textstelle für unser Element und trage den Wert unseres Inputs
    item.appendChild(document.createTextNode(product));

    // Element zu der Liste hinzufügen
    list.appendChild(item);
  }
}

// gesamtpreis anpassen
function overrideResult(price, operator) {
  // finde alle wichtigen Elemente
  //var result = document.getElementById("price_result");

  // werte der produkte herausfinden und in variablen speichern
  var price_result_str = (document.getElementById("price_result").innerHTML).toString();
  var price_result = Number(price_result_str.replace(/[^0-9.-]+/g, ""));

  // gesamtpreis anpassen
  if (operator == "+") {
    document.getElementById("price_result").innerHTML = Math.round((price_result + price) * 100) / 100;
    document.getElementById("remove-button").disabled = false;
    //document.getElementById("remove-input").disabled = false;
  } else if (operator == "-") {
    document.getElementById("price_result").innerHTML = Math.round((price_result - price) * 100) / 100;
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
  // warenkorb in variable speichern
  var cartContent = document.getElementById("product-list").innerHTML;
  sessionStorage.setItem("copyCartContent", cartContent);

  // warenkorb in neuem fenster öffnen (+ zeit und option "drucken" hinzufügen)
  var bill = window.open("");
  bill.document.write("<!DOCTYPE html><html lang='de' dir='ltr'><head><meta charset='utf-8'/><title>bill</title></head><body style='text-align:center;'><p>Rechnung vom <span id='date'></span><script>var today = new Date(); document.getElementById('date').innerHTML = today;</script><ul id='createdBill' style='list-style-type:none;'>" + sessionStorage.getItem('copyCartContent') + "</ul><br></br><br></br><button onclick='window.print()' style='background-color:#dddada;color: #000;text-align: center;text-decoration: none;padding: 10px;'>Rechnung drucken</button></body></html>");
}