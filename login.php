<?php

session_start();
$error = "";

include 'conn.php';

if ($_SESSION) {
  header("location: index.php");
} else {
  if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $hash = password_hash($_POST["password"], PASSWORD_BCRYPT);
    $password = password_verify($_POST["password"], $hash);

    $sql = "SELECT * FROM users WHERE `username`='$username'";
    $res = mysqli_query($conn, $sql);
    $row = $res->fetch_assoc();
    if ($row != NULL) {
      if (password_verify($_POST["password"], $row["password"])) {
        $_SESSION["username"] = $username;
        $_SESSION['id'] = $row['id'];
        header("location: index.php");
      } else {
        $error = "Wrong password";
      }
    } else {
      $error = "That username doesn't exist";
    }
  }
  mysqli_close($conn);
}

$pageTitle = "Login | Mathematics";
include 'header.php';

?>

<div class="container mt-4">
  <form action="login.php" method="POST">
    <div class="form-group">
      <p style="color:red"><?php if(strlen($error)>0) {echo $error;} ?></p>
      <label for="username">Username</label>
      <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
      <input type="checkbox" name="passwordVisible" id="passwordVisible" onclick="show()" tabindex="-1"><label for="passwordVisible">Show Password</label>
    </div>
    <button type="submit" id="submit" name="submit" class="btn btn-primary">Login</button>
  </form>
</div>
<script>
  function show() {
    var pwd = document.getElementById("password");
    var cb = document.getElementById("passwordVisible");
    if (cb.checked == true) {
      pwd.type = "text";
    } else {
      pwd.type = "password";
    }
  }
</script>
<?php

include 'footer.php';

?>