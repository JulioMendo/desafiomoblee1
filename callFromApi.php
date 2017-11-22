<?php

// SETUP

require 'vendor/autoload.php';      // Calling Composer to load dependencies
use PokePHP\PokeApi;
$api = new PokeApi;                 // Calls PHP Wrapper to interact with pokeapi.co 

$all_poke = array();                // Create array for storing all data
$poke_data = array();               // Create array for storing only relevant data

// END SETUP

// GATHER DATA

for ($i = 1; $i < 10; ++$i){

  $api_data = $api->pokemon($i);              
  $nth_poke = json_decode($api_data);
  $all_poke[$i] = $nth_poke;

}

for ($i = 1; $i < 10; ++$i){
  $condition = $all_poke[$i]->types[0]->slot;
  if ($condition == 2){
    $temp = $all_poke[$i]->types[0]->type->name;
    $temp .=" / ";
    $temp .= $all_poke[$i]->types[1]->type->name;
    echo($temp);
    $nth_data = [
      "n_name" => $all_poke[$i]->name,
      "n_height" => $all_poke[$i]->height,
      "n_weight" => $all_poke[$i]->weight,
      "n_type" => $temp,
      "n_sprite" => $all_poke[$i]->sprites->front_default
    ];  
  }
  elseif ($condition == 1){
    $nth_data = [
      "n_name" => $all_poke[$i]->name,
      "n_height" => $all_poke[$i]->height,
      "n_weight" => $all_poke[$i]->weight,
      "n_type" => $all_poke[$i]->types[0]->type->name,
      "n_sprite" => $all_poke[$i]->sprites->front_default
    ];
  }
  $poke_data[$i] = $nth_data;
}
$fp = fopen('poke_results.json', 'w');
fwrite($fp, json_encode($poke_data));
fclose($fp);

?>