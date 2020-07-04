<?php
// datenbankverbindung
$conn = new mysqli("localhost:8889","root","root","cashbox");
?>

<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sign up</title>
  </head>
  <body>
    <section>
      <div id="sign_left">

      </div>
      <div id="sign_right">
        <div id="div-input">
          <form class="" action="" method="post">
            <p class="description">Username</p>
            <input class="user-input" type="text" name="username" placeholder="Username" />
            <br />
            <p class="description">Passwort</p>
            <input class="user-input" type="password" name="password" placeholder="Passwort" />
            <br />
            <button class="sign-button" type="submit" name="submit">Einloggen</button>
            <button class="sign-button" type="button">Ich habe noch keinen Account</button>
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

              while($row = mysqli_fetch_assoc($result)) {
                echo $row['username'] . "<br />";
              }
            }
            mysqli_query($conn, $sql);
          ?>
        </div>
      </div>
    </section>
  </body>
</html>
