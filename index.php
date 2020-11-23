<?php

include 'header.php';

?>
<?php if (!$_SESSION) { ?>
  <div class="jumbotron" style="background-color:#11e4af;">
    <h1 align="center">To see all content, please <a href="login.php">login</a></h1>
  </div>  
<?php } ?>

<div class="row">
  <div class="col-sm-3">
    <div class="card text-white bg-warning">
      <div class="card-header">Geometry</div>
      <div class="card-body">
        <p class="card-text">This is the best place to learn geometry from the basic</p>
        <a href="<?php if ($_SESSION) { ?>geometry.php<?php } else { ?>login.php<?php } ?>" class="btn btn-info">Learn more</a>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card text-white bg-success">
    <div class="card-header">Calculus</div>
      <div class="card-body">
        <p class="card-text">This is perfect opportunity to learn calculus the easy way</p>
        <a href="<?php if ($_SESSION) { ?>calculus.php<?php } else { ?>login.php<?php } ?>" class="btn btn-info">Learn more</a>
      </div>
    </div>
  </div>
</div>

<?php

include 'footer.php';

?>