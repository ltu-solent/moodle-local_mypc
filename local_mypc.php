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
.header { grid-area: header; }
.computers { grid-area: menu; }
.info { grid-area: info1; }
.info2 { grid-area: info2}
.footer { grid-area: footer; }

.grid-container {
  font-family: 'Open Sans', sans-serif;
  display: grid;
  grid-template-areas:
    'header header header header'
    'menu menu menu info1'
    'menu menu menu info2'
    'footer footer footer footer';
  grid-template-columns: auto auto auto 400px;
  grid-template-rows: auto 400px 400px auto;
  padding: 10px;
}

.header {
  text-align: left;
  border-bottom: 2px solid black;
  font-size: 50px;
}

.computers {
  width
}

.info1, .info2 {
  border-left: 2px solid black;
  font-size: 45px;
  text-align: center;
  width: 400px;
}

.info1 p, .info2 p {
  margin-top: 33%;
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
}

th.mypc_availability {
  text-align: left;
}

th.mypc_location {
  text-align: left;
}

td {
  border-bottom: 1px solid black;
}
</style>";
echo $style;

$pcbooking = '<div id="computer_availability">';
$pcbooking .= '</div><p id="refresh_info">This table refreshes every 30 seconds</p>';

$grid = '    <div class="grid-container">
                <div class="header">
                  SOLENT LIBRARY COMPUTERS
                </div>
                <div class="computers">
                  ' . $pcbooking . '
                </div>
                <div class="info1">
                  <p>Almost 400 PCs and Macs</p>
                </div>
                <div class="info2">
                  <p>Silent, Quiet, and Group study areas</p>
                </div>

                <div class="footer">
                  Log-in to any computer or book in advance at mypc.solent.ac.uk
                </div>
            </div>
';

echo $grid;
