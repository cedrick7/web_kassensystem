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
            <p class="description">Vorname</p>
            <input class="user-input" type="text" name="firstname" placeholder="Vorname" />
            <br />
            <p class="description">Nachname</p>
            <input class="user-input" type="text" name="lastname" placeholder="Nachname" />
            <br />
            <p class="description">Username</p>
            <input class="user-input" type="text" name="username" placeholder="Username" />
            <br />
            <p class="description">Passwort</p>
            <input class="user-input" type="password" name="password" placeholder="Passwort" />
            <br />
            <button class="sign-button" type="submit" name="submit">Account erstellen</button>
            <button class="sign-button" type="button">Ich habe schon einen Account</button>
          </form>

          <?php
            $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
            $lastname = mysqli_real_escape_string($conn, $_POST['lasname']);
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);

            $sql = "INSERT INTO user (username, firstname, lastname, username, password)
                    VALUES (?, ?, ?, ?);";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
              echo 'SQL error';
            } else {
              mysqli_stmt_bind_param($stmt, 'iiii', $firstname, $lastname, $username, $password);
              mysqli_stmt_execute($stmt);
            }
          ?>
        </div>
      </div>
    </section>
  </body>
</html>
