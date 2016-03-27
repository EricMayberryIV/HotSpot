/* Required for nav collapse, collapse on click */

$(document).ready(function () {
  $(".navbar-nav li a").click(function(event) {
    $(".navbar-collapse").collapse('hide');
  });
});
