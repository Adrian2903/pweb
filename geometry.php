<?php

session_start();
$pageTitle = 'Geometry | Mathematics';
include 'header.php';

?>
<div class="jumbotron fixed" style="background-color:rgb(96, 202, 26);">
  <h1 align="center">Geometry</h1>
</div>
<div class="container">
  <ul class="nav nav-tabs">
    <li class="nav-item" id="triangle"><a class="nav-link" href="#">Triangle</a></li>
    <li class="nav-item" id="square"><a class="nav-link" href="#">Square</a></li>
  </ul>
  <style>tr>td:first-child{width:2%;}tr>td:nth-child(2){width:50%;}tr>th:nth-child(2){text-align:center;}tr>td{color:green}</style>
  <div class="row">
    <div class="col-lg-12" id="table_triangle">
      <img src="images/triangle1.png" alt="right-triangle">
      <img src="images/triangle2.png" alt="triangle">
      <table class="table table-bordered table-hover table-striped">
        <tr class="table-info">
          <th>No</th>
          <th>Formula</th>
          <th>Note</th>
        </tr>
        <tr>
          <td>1</td>
          <td>$$ a^2 + b^2 = c^2 $$</td>
          <td><p>Phytagoras Formula</p><p>Only apply to right triangle (image left)</p></td>
        </tr>
        <tr>
          <td>2</td>
          <td>$$ A = \frac{b \times h}{2} $$</td>
          <td><p>Area Formula</p><p>b = base, h = height</p></td>
        </tr>
        <tr>
          <td>3</td>
          <td>$$ P = a + b + c $$</td>
          <td><p>Perimeter Formula</p><p>a, b, c = 3 sides of triangle</p></td>
        </tr>
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
        <tr>
          <td>1</td>
          <td>$$ A = s^2 $$</td>
          <td><p>Area Formula</p><p>s = side</p></td>
        </tr>
        <tr>
          <td>2</td>
          <td>$$ P = 4 \times s $$</td>
          <td><p>Perimeter Formula</p><p>s = side</p></td>
        </tr>
      </table>
    </div>
    <script src="geometry.js"></script>
  </div>
</div>

<?php

include 'footer.php';

?>