<?php
//gets the library
require_once('JSONHelper.php');

//reads a quote
JSONHelper::read('database.json', 4);
JSONHelper::read('database.json', 1);
JSONHelper::read('database.json', 3);
JSONHelper::read('database.json', 0);
JSONHelper::read('database.json', 2);

//writes data
JSONHelper::write('database.json', 'this is some data to add');

//updates data
JSONHelper::update('database.json', 4, 'this is a quote wee woo wee woo');

//delete an element from the database
JSONHelper::delete('database.json', 3);
    
?>