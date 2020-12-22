<?php

session_start();
$pageTitle = 'Geometry | Mathematics';
include 'only_head.php';
include 'header.php';
include 'conn.php';

?>
<div class="jumbotron fixed" style="background-color:#95f0e1;">
  <h1 align="center">Geometry</h1>
</div>
<div class="container">
  <ul class="nav nav-tabs">
    <li class="nav-item" id="triangle"><a class="nav-link" href="#">Triangle</a></li>
    <li class="nav-item" id="square"><a class="nav-link" href="#">Square</a></li>
  </ul>
  <style>tr>td:first-child{width:2%;}tr>td:nth-child(2){width:50%;}tr>th:nth-child(2){text-align:center;}tr>td{color:green}</style>
  <div class="row">
    <div class="col-lg-12 table-responsive" id="table_triangle">
      <img src="images/triangle1.png" alt="right-triangle">
      <img src="images/triangle2.png" alt="triangle">
      <table class="table table-bordered table-hover table-striped">
        <tr class="table-info">
          <th>No</th>
          <th>Formula</th>
          <th>Note</th>
        </tr>
        <?php 
          $q = "SELECT * FROM geometry WHERE sub = 'triangle'";
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
    <div class="col-lg-12" id="table_square" style="display:none">
      <img src="images/square.png" alt="square">
      <table class="table table-bordered table-hover table-striped">
        <tr class="table-info">
          <th>No</th>
          <th>Formula</th>
          <th>Note</th>
        </tr>
        <?php 
          $q = "SELECT * FROM geometry WHERE sub = 'square'";
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
    <script src="js/geometry.js"></script>
  </div>
</div>

<?php

include 'footer.php';

?>