<?php

include 'header.php';

?>
<div class="jumbotron fixed" style="background-color:rgb(96, 202, 26);">
  <h1 align="center">Calculus</h1>
</div>
<div class="container">
  <ul class="nav nav-tabs">
    <li class="nav-item" id="triangle"><a class="nav-link" href="#">Derivative</a></li>
    <li class="nav-item" id="square"><a class="nav-link" href="#">Integral</a></li>
  </ul>
  <style>tr>td:first-child{width:2%;}tr>td:nth-child(2){width:49%;}tr>th:nth-child(2){text-align:center;}tr>td{color:green}</style>
  <div class="row">
    <div class="col-lg-12" id="table_triangle">
      <table class="table table-hover table-striped">
        <tr class="table-info">
          <th>No</th>
          <th>Formula</th>
          <th>Note</th>
        </tr>
        <tr>
          <td>1</td>
          <td>$$ \frac{d}{dx}C = 0   $$</td>
          <td><p>C = constant</p></td>
        </tr>
        <tr>
          <td>2</td>
          <td>$$ \frac{d}{dx}\left(x^n\right) = n \times x^{n-1} $$</td>
          <td><p>x = variable, n = constant</p></td>
        </tr>
        <tr>
          <td>3</td>
          <td>$$ \frac{d}{dx}f(x)= f'(x) $$</td>
          <td><p>Notation of derivative of a function</p></td>
        </tr>
        <tr>
          <td>4</td>
          <td>$$ \frac{d}{dx}(f(x) + g(x)) = f'(x) + g'(x) $$</td>
          <td><p>Addition Rule</p><p>f(x), g(x) are functions</p></td>
        </tr>
        <tr>
          <td>5</td>
          <td>$$ \frac{d}{dx}(f(x) \times g(x)) = f'(x) \times g(x) + g'(x) \times f(x)$$</td>
          <td><p>Product Rule</p><p>f(x), g(x) are functions</p></td>
        </tr>
        <tr>
          <td>6</td>
          <td>$$ \frac{d}{dx}\left(\frac{f(x)}{g(x)}\right) = \frac{f'(x) \times g(x) - f(x) \times g'(x)}{{g(x)}^2} $$</td>
          <td><p>Quotion Rule</p><p>f(x), g(x) are functions</p></td>
        </tr>
        <tr>
          <td>7</td>
          <td>$$ \frac{d}{dx}(f(g(x))) = f'(g(x)) \times g'(x) $$</td>
          <td><p>Chain Rule</p><p>f(x), g(x) are functions</p></td>
        </tr>
      </table>
    </div>
    <div class="col-lg-12" id="table_square" style="display:none">
      <table class="table table-hover table-striped">
        <tr class="table-info">
          <th>No</th>
          <th>Formula</th>
          <th>Note</th>
        </tr>
        <tr>
          <td>1</td>
          <td>$$ \int x^n dx = \frac{1}{n+1} \times x^{n+1} + C $$</td>
          <td><p>Indefinite integral</p><p>x = variable</p><p>n, C = constant</p></td>
        </tr>
        <tr>
          <td>2</td>
          <td>$$ \int_b^a F(x) = f(a) - f(b) $$</td>
          <td><p>Definite integral</p><p>F(x) is derivative of f(x); a, b = constant</p></td>
        </tr>
      </table>
    </div>
    <script src="geometry.js"></script>
  </div>
</div>

<?php

include 'footer.php';

?>