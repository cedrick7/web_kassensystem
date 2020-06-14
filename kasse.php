<?php

if($_SERVER['POST'] == "POST" and isset($_POST['Laugenbrezel']))
    {
        select();
    }

function select(){

  echo "ajsndasd";


  // Catch Button Attribute
  $button = $_POST["Laugenbrezel"];

  //SQL DATABASE Setup
  $servername = "https://hosting.iem.thm.de/phpmyadmin/";
  $username = "jfhs38";
  $password = "5Zcxh4eRqyRhwPaG";
  $dbname = "jfhs38_1";
  $endprice = 0;
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  //SQL Statements
  $sql = "Select Preis from Produkte where name is '$button' ";
  $endprice += $conn->query($sql);
  $sql = "Select * from Produkte where name is '$button' ";
  $product = $conn->query($sql);


}
?>

<script>
    // Javascript variable übertragen
    var product = <?php echo json_encode($product); ?>;
</script>

<script>
    // Javascript variable übertragen
    var endprice = <?php echo json_encode($endprice); ?>;
</script>
