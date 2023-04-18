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
    $username = "root";
    $password = "";
    $dbname = "users";
    $mdb = new mysqli($servername, $username, $password, $dbname);
    
    if ($mdb->connect_error) {
        die("Nie udało się połączyć z bazą danych: " . $mdb->connect_error);
    }
    if (isset($_POST['submit'])) {

      $login = $_POST['username'];
      $password = $_POST['password'];

      $sql = "SELECT * FROM users WHERE username='$login' AND password='$password'";
      $result = mysqli_query($mdb, $sql);

      if (mysqli_num_rows($result) > 0) {
          echo "Witam";
      } else {
          echo "Błąd w logowaniu";
      }

      mysqli_close($mdb);
  }
    ?>
  </body>
</html>