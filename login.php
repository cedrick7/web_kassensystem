<?php
// datenbankverbindung
$conn = new mysqli("localhost:8889","root","root","cashbox");
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
          <input class="user-input" type="text" name="username" placeholder="Username" />
          <input class="user-input" type="password" name="password" placeholder="Passwort" />
          <br />
          <button class="sign-button" type="submit" name="submit">Einloggen</button>
        </form>
        <?php
          $username = mysqli_real_escape_string($conn, $_POST['username']);
          $password = mysqli_real_escape_string($conn, $_POST['password']);

          $sql = "SELECT *
                  FROM user
                  WHERE username = ? AND password = ?;";
          $stmt = mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo 'SQL statement failed!';
          } else {
            mysqli_stmt_bind_param($stmt, 'ii', $username, $password);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            $stmt->execute();

            $result = $stmt->get_result();

            if (!$result) {
              echo '<p class="error">Username password combination is wrong!</p>';
            } else {
              if (password_verify($password, $result['PASSWORD'])) {
                $_SESSION['user_id'] = $result['ID'];
                echo '<p class="success"> You are logged in!</p>';
                header("Location: index.html");
                 exit();
              }
            }
        }
        ?>
        </div>
      </div>
    </section>
  </body>
</html>
