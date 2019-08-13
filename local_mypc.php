<?php
global $PAGE;
require_once(dirname(dirname(dirname(__FILE__))).'/config.php');
$url = new moodle_url('/local/mypc/local_mypc.php');
$PAGE->set_url($url);
$jqscript = file_get_contents('https://code.jquery.com/jquery-3.4.1.min.js');
echo "<script>".$jqscript."</script>";
$script .= file_get_contents('js.js');
echo "<script>".$script."</script>";

$pcbooking = '<div id="computer_availability">';
$pcbooking .= '</div><p id="refresh_info">This table refreshes every 30 seconds</p>';

echo $pcbooking;
