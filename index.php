<!DOCTYPE html>
<html>
  <head>
    <title>Logowanie</title>
  </head>
  <body>
    <h1>Logowanie</h1>
    <form>
      <h3>Login: </h3><input type="text" id="username" name="username" required>
      <h3>Hasło: </h3><input type="password" id="password" name="password" required><br><br>
      <input type="submit" name='button' value="Zaloguj się">
    </form>
    
    <?php
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "users";
    
    $mdb = mysqli_connect($servername, $username, $password, $dbname);
    
    if (!$mdb) {
      die("Nie udało się połączyć: " . mysqli_connect_error());
    }
    $sql = "SELECT password FROM users WHERE username = '$username'"; 
    $result = mysqli_query($mdb, $sql);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      if (password_verify($password, $row['password'])) {
        // hasło jest poprawne
      } else {
        // hasło jest niepoprawne
      }
    } else {
      // użytkownik nie istnieje
    }
    ?>
  </body>
</html>