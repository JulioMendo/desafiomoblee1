<?php
require 'vendor/autoload.php';
use PokePHP\PokeApi;
$api = new PokeApi;

$all_poke = array();
$poke_data = array();
// $test = "string";
for ($i = 1; $i< 10; ++$i){
  $api_data = $api->pokemon($i);
  $nth_poke = json_decode($api_data);
  $all_poke[$i] = $nth_poke;
  $test = $all_poke[$i]->name;
  echo($test); 
}
//$first_poke = $api->pokemon('5');
//$pokemon_data = json_decode($first_poke);
// $pokemon_name = $pokemon_data->name;
// $pokemon_height = $pokemon_data->height;
// $pokemon_weight = $pokemon_data->weight;
// $pokemon_types = $pokemon_data->types[0]->slot;
// $pokemon_type = $pokemon_data->types[0]->type->name;
// echo $pokemon_name, "\n", $pokemon_height, "\n", $pokemon_weight, "\n", $pokemon_types, "\n", $pokemon_type, "\n";
// $sendout_array = [
//     "name" => $pokemon_name,
//     "height" => $pokemon_height,
//     "weight" => $pokemon_weight,
//     "types" => $pokemon_types,
//     "type" => $pokemon_type,
// ];
// var_dump($sendout_array);
?>