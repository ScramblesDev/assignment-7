<?php
class JSONHelper {
    public static function read($filename, $index) {
        //check if file exists
        if(!file_exists($filename)) { die('File not found.'); }

        $convertedArray=json_decode(file_get_contents($filename), true);

        //if there's data in the requested index, print it
        if(isset($convertedArray[$index])) { echo $convertedArray[$index]; }
    }

    public static function write($filename, $data) {
        //check if file exists
        if(!file_exists($filename)) { die('File not found.'); }

        //puts json array into php array
        $convertedArray=json_decode(file_get_contents($filename), true);

        //adds data to the php array
        $convertedArray[]=$data;

        //overwrites the file with the new php array
        file_put_contents($filename, json_encode($convertedArray));
    }

    public static function update($filename, $index, $data) {
        //check if file exists
        if(!file_exists($filename)) { die('File not found.'); }

        //puts json array into php array
        $convertedArray=json_decode(file_get_contents($filename), true);

        //check if the index requested actually exists
        if(isset($convertedArray[$index])) {
            //set the requested index's quote to the new quote
            $convertedArray[$index] = $data;
            //overwrites the file with the new php array
            file_put_contents($filename, json_encode(array_values($convertedArray)));
        }
    }

    public static function delete($filename, $index) {
        //check if file exists
        if(!file_exists($filename)) { die('File not found.'); }

        //puts json array into php array
        $convertedArray=json_decode(file_get_contents($filename), true);

        //remove the element of the array
        if(isset($convertedArray[$index])) {
            //empties the element in the php array
            unset($convertedArray[$index]);
            //overwrites the file with the new php array
            file_put_contents($filename, json_encode(array_values($convertedArray)));
        }
    }
}


?>