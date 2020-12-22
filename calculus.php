<?php

session_start();
$pageTitle = 'Calculus | Mathematics';
include 'only_head.php';
include 'header.php';
include 'conn.php';

?>
<div class="jumbotron fixed" style="background-color:#95f0e1;">
  <h1 align="center">Calculus</h1>
</div>
<div class="container">
  <ul class="nav nav-tabs">
    <li class="nav-item" id="der"><a class="nav-link" href="#">Derivative</a></li>
    <li class="nav-item" id="int"><a class="nav-link" href="#">Integral</a></li>
  </ul>
  <style>tr>td:first-child{width:2%;}tr>td:nth-child(2){width:49%;}tr>th:nth-child(2){text-align:center;}tr>td{color:green}</style>
  <div class="row">
    <div class="col-lg-12 table-responsive">
      <table class="table table-hover table-striped" id="deriv">
        <tr class="table-info">
          <th>No</th>
          <th>Formula</th>
          <th>Note</th>
        </tr>
        <?php 
          $q = "SELECT * FROM calculus WHERE sub = 'derivative'";
          $res = mysqli_query($conn, $q);
          $i = 1;
          while ($row = $res->fetch_row()) { ?>
            <tr>
              <td><?= $i++;?></td>
              <td><?= $row[1];?></td>
              <td><p><?= $row[2];?></p></td>
            </tr>
        <?php } ?>
      </table>
      <table class="table table-hover table-striped" id="intg" style="display:none">
        <tr class="table-info">
          <th>No</th>
          <th>Formula</th>
          <th>Note</th>
        </tr>
        <?php 
          $q = "SELECT * FROM calculus WHERE sub = 'integral'";
          $res = mysqli_query($conn, $q);
          $i = 1;
          while ($row = $res->fetch_row()) { ?>
            <tr>
              <td><?= $i++;?></td>
              <td><?= $row[1];?></td>
              <td><p><?= $row[2];?></p></td>
            </tr>
        <?php } ?>
      </table>
    </div>
    <script src="js/calculus.js"></script>
  </div>
</div>

<?php

include 'footer.php';

?>