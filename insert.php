<?php

session_start();
$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path);
$now = $uri_segments[2];
include 'conn.php';

if (isset($_POST["submit"])) {
  $formula = $_POST["MathInput"];

  $note = $_POST["note"];

  $res = explode(";", $_POST["sub_table"]);
  $table = $res[0];
  $sub = $res[1];
  $q = "INSERT INTO $table (`formula`, `note`, `sub`) VALUES ('".addslashes($formula)."', '$note', '$sub')";

  if (mysqli_query($conn, $q)) {
    mysqli_close($conn);
    header("location: insert.php");
  } else {
    die("hehe");
  }
}

$pageTitle = "New Formula | Mathematics";
include 'only_head.php';

?>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  <script type="text/x-mathjax-config">
    MathJax.Hub.Config({
      showProcessingMessages: false,
      tex2jax: { inlineMath: [['$','$'],['\\(','\\)']] }
    });
  </script>
  <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
  <script id="MathJax-script" src="http://bandicoot.maths.adelaide.edu.au/MathJax/MathJax.js?config=TeX-AMS-MML_HTMLorMML"></script>

  <script>
    var Preview = {
      delay: 150, 

      preview: null,
      buffer: null, 

      timeout: null,
      mjRunning: false,
      oldText: null,

      Init: function() {
        this.preview = document.getElementById("MathPreview");
        this.buffer = document.getElementById("MathBuffer");
      },

      SwapBuffers: function() {
        var buffer = this.preview,
          preview = this.buffer;
        this.buffer = buffer;
        this.preview = preview;
        buffer.style.visibility = "hidden";
        buffer.style.position = "absolute";
        preview.style.position = "";
        preview.style.visibility = "";
      },

      Update: function() {
        if (this.timeout) {
          clearTimeout(this.timeout);
        }
        this.timeout = setTimeout(this.callback, this.delay);
      },

      CreatePreview: function() {
        Preview.timeout = null;
        if (this.mjRunning) return;
        var text = document.getElementById("MathInput").value;
        if (text === this.oldtext) return;
        this.buffer.innerText = this.oldtext = text;
        this.mjRunning = true;
        MathJax.Hub.Queue(
          ["Typeset", MathJax.Hub, this.buffer],
          ["PreviewDone", this]
        );
      },
      
      PreviewDone: function() {
        this.mjRunning = false;
        this.SwapBuffers();
      }
    };
    Preview.callback = MathJax.Callback(["CreatePreview", Preview]);
    Preview.callback.autoReset = true;
  </script>
<?php 
  include 'header.php';
?>
<div class="container mt-4">
  <form action="insert.php" method="POST">
    <div class="form-group">
      <label for="MathInput">Formula</label>
      <textarea class="form-control" id="MathInput" name="MathInput" onkeyup="Preview.Update()"></textarea>
    </div>
    <div class="form-group">
      <label for="MathPreview">Preview</label>
      <p class="form-control" id="MathPreview" name="MathPreview"></p>
      <p class="form-control" id="MathBuffer" name="MathBuffer" style="visibility:hidden"></p>
      <div>
        <script>
          Preview.Init();
        </script>
      </div>
    </div>
    <div class="form-group">
      <label for="note">Note</label>
      <input type="text" class="form-control" id="note" name="note">
    </div>
    <div class="form-group">
      <select name="sub_table" id="sub_table">
        <optgroup label="Geometry">
          <option value="geometry;triangle">Triangle</option>
          <option value="geometry;square">Square</option>
        </optgroup>
        <optgroup label="Calculus">
          <option value="calculus;derivative">Derivative</option>
          <option value="calculus;integral">Integral</option>
        </optgroup>
      </select>  
    </div>
    <button type="submit" id="submit" name="submit" class="btn btn-primary">Insert</button>
  </form>
</div>

<?php

include 'footer.php';

?>