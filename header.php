<?php
session_start();
$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path);
$now = $uri_segments[2];

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mathemathics</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src='https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=default'></script>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #2fe4c6;">
    <a class="navbar-brand" href="index.php">Math</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item <?php if ($now === "index.php") { ?>active<?php } ?>">
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Content
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?php if ($_SESSION) { ?>geometry.php<?php } else { ?>login.php<?php } ?>">Geometry</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php if ($_SESSION) { ?>calculus.php<?php } else { ?>login.php<?php } ?>">Calculus</a>
          </div>
        </li>
      </ul>
    </div>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item <?php if ($now === "register.php") { ?>active<?php } ?>" <?php if ($_SESSION) { ?>style="display:none;"<?php } ?>>
          <a class="nav-link" href="register.php">Register</a>
        </li>
        <li class="nav-item <?php if ($now === "login.php") { ?>active<?php } ?>" <?php if ($_SESSION) { ?>style="display:none;"<?php } ?>>
          <a class="nav-link" href="login.php">Login</a>
        </li>
        <li class="nav-item <?php if ($now === "profile.php") { ?>active<?php } ?>" <?php if (!$_SESSION) { ?>style="display:none;"<?php } ?>>
          <a class="nav-link" href="profile.php">Profile</a>
        </li>
        <li class="nav-item <?php if ($now === "logout.php") { ?>active<?php } ?>" <?php if (!$_SESSION) { ?>style="display:none;"<?php } ?>>
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </nav>
