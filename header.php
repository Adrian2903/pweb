</head>
<body>
  <nav class="navbar navbar-expand-md navbar-light" style="background-color: #2fe4c6;">
    <!-- <a class="navbar-brand" href="#"><img src="images/logo.png" alt="Math"></a> -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item <?php if ($now === "index.php") { ?>active<?php } ?>">
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown <?php if ($now === "calculus.php" || $now === "geometry.php") { ?>active<?php } ?>">
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
      <ul class="navbar-nav ml-auto">
        <li class="nav-item <?php if ($now === "register.php") { ?>active<?php } ?>" <?php if ($_SESSION) { ?>style="display:none;"<?php } ?>>
          <a class="nav-link" href="register.php">Register</a>
        </li>
        <li class="nav-item <?php if ($now === "login.php") { ?>active<?php } ?>" <?php if ($_SESSION) { ?>style="display:none;"<?php } ?>>
          <a class="nav-link" href="login.php">Login</a>
        </li>
        <li class="nav-item <?php if ($now === "profile.php") { ?>active<?php } ?>" <?php if (!$_SESSION) { ?>style="display:none;"<?php } ?>>
          <a class="nav-link" href="profile.php"><?= $_SESSION["username"];?></a>
        </li>
        <?php 
          if (!isset($_SESSION["roles"])) {
            $roles = "";
          } else {
            $roles = $_SESSION["roles"];
          }
        ?>
        <li class="nav-item <?php if ($now === "insert.php") { ?>active<?php } ?>" <?php if ($roles !== "admin") { ?>style="display:none;"<?php } ?>>
          <a class="nav-link" href="insert.php">Insert</a>
        </li>
        <li class="nav-item <?php if ($now === "logout.php") { ?>active<?php } ?>" <?php if (!$_SESSION) { ?>style="display:none;"<?php } ?>>
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </nav>
