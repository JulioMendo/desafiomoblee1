<?php
require 'vendor/autoload.php';
use PokePHP\PokeApi;
$api = new PokeApi;

$all_poke = array();
$poke_data = array();
for ($i = 1; $i < 3; ++$i){
  $api_data = $api->pokemon($i);
  $nth_poke = json_decode($api_data);
  $all_poke[$i] = $nth_poke;
}
for ($i = 1; $i < 3; ++$i){
  $condition = $all_poke[$i]->types[0]->slot;
  if ($condition == 2){
    $nth_data = [
      "n_name" => $all_poke[$i]->name,
      "n_height" => $all_poke[$i]->height,
      "n_weight" => $all_poke[$i]->weight,
      "n_type_1" => $all_poke[$i]->types[0]->type->name,
      "n_type_2" => $all_poke[$i]->types[1]->type->name,
    ];  
  }
  elseif ($condition == 1){
    $nth_data = [
      "n_name" => $all_poke[$i]->name,
      "n_height" => $all_poke[$i]->height,
      "n_weight" => $all_poke[$i]->weight,
      "n_type_1" => $all_poke[$i]->types[0]->type->name,
    ];
  }
  $poke_data[$i] = $nth_data;
}
echo json_encode($poke_data);
?>