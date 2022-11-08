<?php
class CSVHelper {
    //this reads and prints the entire csv file into a php array
    function toPHPArray($csvFile) : array {
        $fh = fopen($csvFile, 'r');
    
        while (!feof($fh) ) {
            $lines[] = fgetcsv($fh, 1000, '#');
        }

        fclose($fh);
        return $lines;
    }
    
    //this reads and prints one element of csv data that's been converted into a php array
    public static function read($csvfile, $index) {
        $csv = toPHPArray($csvfile);
        return $csv[$index];
    }

    //this adds a new record to the end of the csv file
    public static function write($csvFile, $newrecord) {
        $fh = fopen($csvFile, "a");
        fputs($fh, implode('#', $newrecord)."\n"); //remember that $newrecord is an array of strings!
        fclose($fh);
    }

    //converts a PHP array into a CSV file
    public static function convertToCSV(string $csvfile, array $myArray) {
        //open file
        $fh = fopen($csvfile, 'w');
        //loop through
        for ($i = 0; $i < count($myArray); $i++) {
            fputs($fh, implode('#', $myArray[$i])."\n"); //remember that $newrecord is an array of strings!
        }
        //close the file
        fclose($fh);
    }

    //edits a specific line of a csv file
    public static function edit(string $csvfile, int $requestedRecordIndex, array $newRecord) {
        //convert the data to a php array
        $convertedPHPArray = toPHPArray($csvfile);

        //replace the array embedded in the converted data to one that the user gives
        $convertedPHPArray[$requestedRecordIndex] = $newRecord;

        //convert the php array back into a csv file
        convertToCSV($csvfile, $convertedPHPArray);
    }

    //deletes a specific line of a csv file
    public static function delete($csvfile, $requestedRecordIndex) {
        //convert the data to a php array
        $convertedPHPArray = toPHPArray($csvfile);

        //make the requested position blank
        $convertedPHPArray[$requestedRecordIndex] = "";

        //convert the php array back into a csv file
        convertToCSV($csvfile, $convertedPHPArray);
    }
}


?>