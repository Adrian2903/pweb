<?php

session_start();
include 'conn.php';

if (!$_SESSION) {
  header("location: login.php");
} else {
  $username = $_SESSION["username"];

  if (isset($_POST["submit"])) {
    $username = $_SESSION["username"];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);

    $sql = "UPDATE users set `password`='$password' WHERE `username` = '$username'";
    if (mysqli_query($conn, $sql)) {
      mysqli_close($conn);
      if (setcookie("pwd", $_POST["password"])) {
        header("location: profile.php");
      } else {
        echo "...";
      }
    }
  } else {
    $sql = "SELECT * FROM users WHERE `username`='$username'";
    $res = mysqli_query($conn, $sql);
    $row = $res->fetch_assoc();

    $password = $_COOKIE["pwd"];
    mysqli_close($conn);
  }
}
$pageTitle = "$username's| Mathematics";
include 'only_head.php';
include 'header.php';

?>

<div class="container mt-4">
  <form action="profile.php" method="POST">
    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" class="form-control" id="username" name="username" value="<?= $username; ?>" disabled>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" name="password" value="<?= $password; ?>" required>
      <input type="checkbox" name="passwordVisible" id="passwordVisible" onclick="show()" tabindex="-1"><label for="passwordVisible">Show Password</label>
    </div>
    <button type="submit" id="submit" name="submit" class="btn btn-primary">Update</button>
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