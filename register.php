<?php

$error = "";

include 'header.php';
include 'conn.php';

if ($_SESSION) {
  header("location: index.php");
} else {
  if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
    $email = $_POST["email"];

    $sql = "INSERT INTO users (`username`, `email`, `password`) VALUES ('$username', '$email', '$password')";
    if (mysqli_query($conn, $sql)) {
      mysqli_close($conn);
      header("location: login.php");
    } else {
      $error = "That username has been used by someone else";
    }
  }
  mysqli_close($conn);
}

?>

<div class="container mt-4">
  <form action="register.php" method="POST">
    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" onkeyup="toggle(this, 'submit')" required>
      <span style="color:red"><?php if (strlen($error)>0) {echo $error;} ?></span>
    </div>
    <div class="form-group">
      <label for="email">Email address</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" onkeyup="toggle(this, 'submit')" required>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" value="" onkeyup="func();toggle(this, 'submit');" required>
      <input type="checkbox" name="passwordVisible" id="passwordVisible" onclick="show()" tabindex="-1"><label for="passwordVisible">Show Password</label>
    </div>
    <div class="form-group">
      <label for="confirmPassword">Confirm Password</label>
      <input type="password" class="form-control" id="confirmPassword" aria-describedby="check" placeholder="Repeat your password" onkeyup="func();toggle(this, 'submit')" required>
      <input type="checkbox" name="confirmVisible" id="confirmVisible" onclick="show_c()" tabindex="-1"><label for="confirmVisible">Show Password</label>
      <p id="check"></p>
    </div>
    <button type="submit" id="submit" name="submit" class="btn btn-primary" disabled="disabled">Register</button>
  </form>
</div>
<script type="text/javascript">
  function func() {
    var pwd = document.getElementById("password").value;
    var cpwd = document.getElementById("confirmPassword").value;
    var check = document.getElementById("check");
    if (pwd == cpwd && pwd) {
      check.innerHTML = "Password matches!";
      check.style.color = "green";
    } else {
      check.innerHTML = "Password doesn't match";
      check.style.color = "red";
    }
  }
  function toggle(ref, id) {
    var name = document.getElementById("username").value;
    var email = document.getElementById("email").value;
    var pwd = document.getElementById("password").value;
    var cpwd = document.getElementById("confirmPassword").value;
    document.getElementById(id).disabled = (pwd != cpwd || pwd.length == 0 || cpwd.length == 0 || !name || !email);
  }
  function show() {
    var pwd = document.getElementById("password");
    var cb = document.getElementById("passwordVisible");
    if (cb.checked == true) {
      pwd.type = "text";
    } else {
      pwd.type = "password";
    }
  }
  function show_c() {
    var pwd = document.getElementById("confirmPassword");
    var cb = document.getElementById("confirmVisible");
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