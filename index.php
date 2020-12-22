<?php

session_start();
$pageTitle = 'Home | Mathematics';
include 'only_head.php';
include 'header.php';

?>
<?php if (!$_SESSION) { ?>
  <div class="jumbotron" style="background-color:#11e4af;padding:1em">
    <h1 align="center">Please <a href="login.php">login</a> before you can access all material</h1>
  </div>  
<?php } else { ?>
  <div class="jumbotron" style="background-color:#95f0e1;padding:1em">
    <h1 align="center">Thank you for joining us</h1>
  </div>
<?php  } ?>

<?php function card($title, $msg, $color, $link) { ?>
  <div class="col-sm-3">
    <div class="card text-white bg-<?php echo $color;?>">
      <div class="card-header"><?php echo $title;?></div>
      <div class="card-body">
        <p class="card-text"><?php echo $msg;?></p>
        <a href="<?php if ($_SESSION) { echo $link;?>.php<?php } else { ?>login.php<?php }?>" class="btn btn-info">Learn more</a>
      </div>
    </div>
  </div>
<?php } ?>

<div class="row">
  <?php
    card('Geometry', 'This is the best place to learn geometry from the basic', 'warning', 'geometry');
    card('Calculus', 'This is perfect opportunity to learn calculus the easy way', 'success', 'calculus');
  ?>
</div>

<?php

include 'footer.php';

?>