var triangle = document.getElementById("table_triangle");
var square = document.getElementById("table_square");

var triangle_nav = document.getElementById("triangle");
var square_nav = document.getElementById("square");

triangle_nav.addEventListener("click", triangleClick);
square_nav.addEventListener("click", squareClick);

function triangleClick() {
  square.style.display = "none";
  triangle.style.display = "";
}

function squareClick() {
  square.style.display = "";
  triangle.style.display = "none";
}