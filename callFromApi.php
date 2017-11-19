<?php
require 'vendor/autoload.php';
use PokePHP\PokeApi;
$api = new PokeApi;

$first_poke = $api->pokemon('5');
$pokemon_data = json_decode($first_poke);

// var_dump($pokemon_data);
// $pokemon_typest = $pokemon_data->types;
// $pokemon_typer = $pokemon_typest[0]->type;
// $pokemon_type = $pokemon_typer->name;
$pokemon_name = 
$pokemon_type_quantity = $pokemon_data->types[0]->slot;
echo($pokemon_type_quantity);
$pokemon_type = $pokemon_data->types[0]->type->name;
echo($pokemon_type);
// $pokemon_type = $pokemon_types['type']['name'];
// echo($pokemon_type);
?>