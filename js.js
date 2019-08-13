$(document).ready(function() {
  var container = document.getElementById("computer_availability");
  //Build table on page load
  getTable();

  if (container) {
    setInterval(function () {
      container.innerHTML= '';
      $("#computer_availability").addClass("spinner fa fa-circle-o-notch fa-spin");
      setTimeout(function () {
        getTable();
      }, 100);
    }, 30000);
  }

  function getTable(){
    $.ajax({
      url: '../mypc/externallib.php',
      type: 'post',
      data: { "callTableFunc": "1"},
      success: function(response) {
        container.innerHTML= response;
      },
      complete: function () {
        $("#computer_availability").removeClass("spinner fa fa-circle-o-notch fa-spin");
      }
    });
  }
});
