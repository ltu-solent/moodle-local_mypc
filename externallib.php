<?php

//this file will echo a response to post requests for generating the library computers table

function create_computers_table () {

  $url = 'https://mypc.solent.ac.uk/MyPC/Front.aspx?page=getResourceStatesAPI';
  $computers = json_decode(file_get_contents($url, true));
  $zones = json_decode(file_get_contents("zones.json", true));

  $table = '
  <table id="mypc_table"><tr><th class="mypc_location">Location</th><th class="mypc_zone">Zone</th><th class="mypc_availability">Availability</th><th class="mypc_total">Total</th></tr>';

  foreach ($computers[1]->locations as $locations) {
    foreach($zones as $k => $v){
      if($v->id == $locations->id){
        $mypc_zone = $v->zone;
      }
    }

    $total = 0;
    $available = 0;
    $class = '';
    foreach($locations->resources as $resources) {
      $total++;
      if ($resources->state == "AVAILABLE") {
        $available++;
      }
    }

    if ($available == 0) {
      $class = 'class="unavailable"';
    }

    $table .=
    '<tr '. $class . '>
      <td class="mypc_location">' . $locations->name . '</td>
      <td class="mypc_zone">' . $mypc_zone . '</td>
      <td class="mypc_availability">' . $available . '</td>
      <td class="mypc_total">' . $total . '</td>
    </tr>';
  }
  $table .= '
  </table>';
  return $table;
}

echo create_computers_table();
