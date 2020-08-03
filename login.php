<?php
// datenbankverbindung
$conn = new mysqli("localhost:8889","root","root","cashbox");

$error=''; //Variable to Store error message;
if(isset($_POST['submit'])){
  if(empty($_POST['username']) || empty($_POST['password'])){
    $error = "Username or Password is Invalid";
  } else {
    //Define $user and $pass
    $username=$_POST['username'];
    $password=$_POST['password'];
    //var_dump('us:'.$username.'#ps'.$password)
    //sql query to fetch information of registerd user and finds user match.
   $sql = "SELECT username, password FROM user WHERE username = ? LIMIT 1";
  // Fetch one and one row
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s",$username);
  $stmt->execute();

  $result = $stmt->get_result();

  //daten container
  $user_arr = Array();

  //packen alle daten in array
  while ($row = $result->fetch_assoc())
  {
      $user_arr[] = $row;
  }

    if(password_verify($password,$user_arr[0]['password'])){
      session_start();
      $_SESSION["user"] = $user_arr[0]["username"];
      header("Location: index.php"); // Redirecting to other page
    } else {
      $error = "Username oder Passwort ist falsch!";
    }
    mysqli_close($conn); // Closing connection
  }
}
?>

<!DOCTYPE html>
<html lang="de" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Sign in</title>
  <link rel="stylesheet" href="styles.min.css">
  <script type="text/javascript" src="script.js"></script>
</head>

<body id="body-login">
  <section id="login">
    <div id="sign_left">
    </div>
    <div id="sign_right">
      <div id="div-input">
        <p class="description">Login</p>
        <form class="" action="" method="post">
          <input id="username" class="user-input" type="text" name="username" placeholder="Username" />
          <input id="password" class="user-input" type="password" name="password" placeholder="Passwort" />
          <br />
          <button class="sign-button" type="submit" name="submit">Einloggen</button>
          <br />
          <span style="color:red;"><?php echo $error; ?></span>
        </form>
        <?php
        //   $username = mysqli_real_escape_string($conn, $_POST['username']);
        //   $password = mysqli_real_escape_string($conn, $_POST['password']);
        //
        //   $sql = "SELECT *
        //           FROM user
        //           WHERE username = ? AND password = ?;";
        //   $stmt = mysqli_stmt_init($conn);
        //   if (!mysqli_stmt_prepare($stmt, $sql)) {
        //     echo 'SQL statement failed!';
        //   } else {
        //     mysqli_stmt_bind_param($stmt, 'ii', $username, $password);
        //     mysqli_stmt_execute($stmt);
        //     $result = mysqli_stmt_get_result($stmt);
        //
        //     $stmt->execute();
        //
        //     $result = $stmt->get_result();
        //
        //     if (!$result) {
        //       echo '<p class="error">Username password combination is wrong!</p>';
        //     } else {
        //       if (password_verify($password, $result['PASSWORD'])) {
        //         $_SESSION['user_id'] = $result['ID'];
        //         echo '<p class="success"> You are logged in!</p>';
        //         header("Location: index.php");
        //          exit();
        //       }
        //     }
        // }

        ?>

        </div>
      </div>
    </section>
  </body>
</html>
