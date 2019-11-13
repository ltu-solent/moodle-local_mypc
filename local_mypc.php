<?php
global $PAGE;
require_once(dirname(dirname(dirname(__FILE__))).'/config.php');
$url = new moodle_url('/local/mypc/local_mypc.php');
$PAGE->set_url($url);
$jqscript = file_get_contents('https://code.jquery.com/jquery-3.4.1.min.js');
echo "<script>".$jqscript."</script>";
$script .= file_get_contents('js.js');
echo "<script>".$script."</script>";
echo '<link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">';
$style = "    <style>
.header { -ms-grid-row: 1; -ms-grid-column: 1; -ms-grid-column-span: 4; grid-area: header; }
.computers { -ms-grid-row: 2; -ms-grid-row-span: 2; -ms-grid-column: 1; -ms-grid-column-span: 3; grid-area: menu; }
.info1 { -ms-grid-row: 2; -ms-grid-column: 4; grid-area: info1; }
.info2 { -ms-grid-row: 3; -ms-grid-column: 4; grid-area: info2; }
.footer { -ms-grid-row: 4; -ms-grid-column: 1; -ms-grid-column-span: 4; grid-area: footer; }

.grid-container {
  font-family: 'Open Sans', sans-serif;
  display: -ms-grid;
  display: grid;
      grid-template-areas:
    'header header header header'
    'menu menu menu info1'
    'menu menu menu info2'
    'footer footer footer footer';
  -ms-grid-columns: 1fr 1fr 1fr 1fr;
  grid-template-columns: auto auto auto 400px;
  -ms-grid-rows: auto 400px 400px auto;
  grid-template-rows: auto 400px 400px auto;
  padding: 10px;
}

.header {
  text-align: left;
  border-bottom: 2px solid black;
  font-size: 50px;
  padding-bottom: 18px;
}

#refresh_info {
  font-size: 10px;
  text-align: right;
}

.info1, .info2 {
  border-left: 2px solid black;
  font-size: 45px;
  text-align: center;
  width: 400px;
}

.info1 p, .info2 p {
  margin-top: 33%;
  font-size: 2vw;
}

.info1 {
  border-bottom: 2px solid black;
}

.footer {
  text-align: center;
  border-top: 2px solid black;
  font-size: 45px;
}

table#mypc_table {
  height: 750px;
  width: 100%;
  border-collapse: collapse !important;
  font-size: 2em;
}

th.mypc_availability, th.mypc_location, th.mypc_total {
  text-align: left;
}

td {
  border-bottom: 1px solid black;
}

.unavailable {
  background:  #E0E0E0 ;
}

.solent-logo{
  float: left;
  padding-right: 30px;
}
</style>";
echo $style;

$pcbooking = '<div id="computer_availability"></div>';

$grid = '    <div class="grid-container">
                <div class="header">
                  <div class="solent-logo"><img src="images/solent-university-logo.svg" alt="Solent logo" height="70px"></div>
                  <div>Library Computer Availability</div>
                </div>
                <div class="computers">
                  ' . $pcbooking . '
                </div>
                <!--<div class="info1">
                  <p>Almost 400 PCs and Macs</p>
                </div>
                <div class="info2">
                  <p>Silent, Quiet, and Group study areas</p>
                </div>

                <div class="footer">
                  Log-in to any computer or book in advance at mypc.solent.ac.uk
                </div>-->
            </div>
';

echo $grid;
