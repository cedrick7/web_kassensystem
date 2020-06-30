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


// Funktionen des Taschenrechners

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


// Produkte zum Warenkorb hinzufügen

function addToCart(product_name, product_price) {
  // finde alle wichtigen Elemente
  var list = document.getElementById("product-list");

  // werte der produkte herausfinden und in variablen speichern
  // var product_item = document.getElementById("product-01");
  // var product_name = (document.getElementById("product-01_name").innerHTML).toString();
  // var product_price_str = (document.getElementById("product-01_price").innerHTML).toString();
  // var product_price = Number(product_price_str.replace(/[^0-9.-]+/g, ""));

  // array für ausgewählte produkte erstellen
  var cart = [
    [1, "Keine Produkte ausgewählt!", 0.00]
  ]

  // ausgewählte produkte zum array hinzufügen
  cart.push([1, product_name, product_price]);

  // ausgewählte produkte zum warenkorb hinzufügen und gesamtpreis anpassen
  for (var i = 1; i <= cart.length - 1; i++) {
    var productCount = (cart[i][0]).toString();
    var productName = cart[i][1];
    var productPrice = (cart[i][2]).toString();
    var product = productName + "  –  " + productPrice + "€";
    //var product = productCount + "x " + productName + ", " + productPrice + "€";
    console.log(product);
    price_result += cart[i][2];

    // erstelle ein neues Element li, das später in unsere Liste aufgenommen wird
    var item = document.createElement("li");

    // erstelle eine Textstelle für unser Element und trage den Wert unseres Inputs
    item.appendChild(document.createTextNode(product));

    // Element zu der Liste hinzufügen
    list.appendChild(item);
  }

  overrideResult(product_price);
}

// gesamtpreis anpassen
function overrideResult(price) {
  // finde alle wichtigen Elemente
  var result = document.getElementById("price_result");


  // werte der produkte herausfinden und in variablen speichern
  var price_result_str = (document.getElementById("price_result").innerHTML).toString();
  var price_result = Number(price_result_str.replace(/[^0-9.-]+/g, ""));

  // Platzhalter
  function countPlaceholder() {
    // finde alle wichtigen Elemente
    var list = document.getElementById("product-list");

    var placeholder_check = false;
    if (placeholder_check) {
      list.removeChild(list.childNodes[0]);
      placeholder_check = false;
    }
  }

  // gesamtpreis anpassen
  document.getElementById("price_result").innerHTML = Math.round((price_result + price) * 100) / 100;
}


// Rechnung als PDF speichern

function generateBill() {

  var pageContent = document.getElementById("product-list").innerHTML;
  sessionStorage.setItem("page1content", pageContent);

  var bill = window.open("");
  bill.document.write("<!DOCTYPE html><html lang='de' dir='ltr'><head><meta charset='utf-8'/><title>bill</title></head><body><p>Rechnung vom <span id='date'></span><script>var today = new Date(); document.getElementById('date').innerHTML = today;</script><ul id='createdBill' style='list-style-type:none;'>" + sessionStorage.getItem('page1content') + "</ul></body></html>");

}