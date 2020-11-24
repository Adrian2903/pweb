<?php

session_start();
$pageTitle = 'Home | Mathematics';
include 'header.php';

?>
<?php if (!$_SESSION) { ?>
  <div class="jumbotron" style="background-color:#11e4af;padding:1em">
    <h1 align="center">Please <a href="login.php">login</a> before you can access all material</h1>
  </div>  
<?php } ?>
<?php function card($title, $msg, $color) { ?>
  <div class="col-sm-3">
    <div class="card text-white bg-<?= $color?>">
      <div class="card-header"><?= $title?></div>
      <div class="card-body">
        <p class="card-text"><?= $msg?></p>
        <a href="<?php if ($_SESSION) { echo $title;?>.php<?php } else { ?>login.php<?php } ?>" class="btn btn-info">Learn more</a>
      </div>
    </div>
  </div>
<?php } ?>
<div class="row">
  <?php
    card('Geometry', 'This is the best place to learn geometry from the basic', 'warning');
    card('Calculus', 'This is perfect opportunity to learn calculus the easy way', 'success');
  ?>
</div>

<?php

include 'footer.php';

?>