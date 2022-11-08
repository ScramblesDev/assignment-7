<?php
//gets the library
require_once('CSVHelper.php');

//reads a quote
CSVHelper::read('database.csv', 4);
CSVHelper::read('database.csv', 1);
CSVHelper::read('database.csv', 3);
CSVHelper::read('database.csv', 0);
CSVHelper::read('database.csv', 2);

//writes data
CSVHelper::write('database.csv', 'this is some data to add');

//updates data
CSVHelper::update('database.csv', 3, 'this is a quote wee woo wee woo');

//delete an element from the database
CSVHelper::delete('database.csv', 3);
    
?>