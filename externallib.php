<?php

//this file will echo a response to post requests for generating the library computers table

function create_computers_table () {

  $url = 'https://mypc.solent.ac.uk/MyPC/Front.aspx?page=getResourceStatesAPI';
  $computers = json_decode(file_get_contents($url, true));
  $table = '
  <div><table id="mypc_table"><tr>
  <th class="mypc_location">' . $computers[1]->name . '</th>
  <th class="mypc_availability">Availability</th></tr>';

  foreach ($computers[1]->locations as $locations) {
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
      <td class="mypc_availability">' . $available . '/' . $total . '</td>
    </tr>';
  }
  $table .= '
  </table></div>';
  return $table;
}

echo create_computers_table();
