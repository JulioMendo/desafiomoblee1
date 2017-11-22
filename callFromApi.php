<?php

// SETUP

require 'vendor/autoload.php';      // Calling Composer to load dependencies
use PokePHP\PokeApi;
$api = new PokeApi;                 // Calls PHP Wrapper to interact with pokeapi.co 

$all_poke = array();                // Create array for storing all data
$poke_data = array();               // Create array for storing only relevant data

// END SETUP

// DATA DUMP

for ($i = 1; $i < 10; ++$i){

  // $api_data = $api->pokemon($i);              // This loops over the first 9 pokemon.
  // $nth_poke = json_decode($api_data);         // Decodes the data from the API, then assigns the object
  // $all_poke[$i] = $nth_poke;                  // i_th position of the array. Could be i-1, but more readable with i. 

  $random = rand(1, 802);                     // This is code to make the process of selecting the pokemon random.
  $api_data = $api->pokemon($random);         // 
  $nth_poke = json_decode($api_data);         //
  $all_poke[$i] = $nth_poke;                  // Uncomment this, and comment above, to make it random!
}

// END DATA DUMP

// DATA FILTER

for ($i = 1; $i < 10; ++$i){                                    // This will loop over the 9 selected pokemon data
                                                                // Picking only desired data
  $condition = $all_poke[$i]->types[0]->slot;                     // Handy "slot" for defining how many types a poke has.
  if ($condition == 2){                                         // Since some poke have 2 types, this will display
                                                                // them together, appending '/' between the types.
    $temp = $all_poke[$i]->types[0]->type->name;
    $temp .=" / ";
    $temp .= $all_poke[$i]->types[1]->type->name;               // Operator .= appends data and $temp itself
    
    $nth_data = [

      "n_name" => $all_poke[$i]->name,                          // This is all the relevant data we'll be sending
      "n_height" => $all_poke[$i]->height,                      // 
      "n_weight" => $all_poke[$i]->weight,                      //
      "n_type" => $temp,                                        //
      "n_sprite" => $all_poke[$i]->sprites->front_default       // Name, height, weight, type(s) and the sprite.

    ];  
  }

  elseif ($condition == 1){

    $nth_data = [
      "n_name" => $all_poke[$i]->name,                          // Same here, but we will pick the type directly.
      "n_height" => $all_poke[$i]->height,
      "n_weight" => $all_poke[$i]->weight,
      "n_type" => $all_poke[$i]->types[0]->type->name,
      "n_sprite" => $all_poke[$i]->sprites->front_default

    ];
  }

  $poke_data[$i] = $nth_data;                                   // This will append all of the data we just made to 
                                                                // the specific slot in the $poke_data array.
}
// END DATA FILTER;

// MAKE JSON FILE

$fp = fopen('poke_results.json', 'w');                          // Makes the file dump, re-writting the file every time
fwrite($fp, json_encode($poke_data));                           // a new request to callFromApi.php is made
fclose($fp);                                                    // this keeps the Pokemon data up-to-date

// END MAKE JSON FILE

?>