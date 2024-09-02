<?php

function removeTableSchemas($inputFile, $outputFile) {
    // Read the entire SQL file
    $sqlContent = file_get_contents($inputFile);
    
    // Regular expression to match CREATE TABLE statements
    $pattern = '/CREATE\s+TABLE\s+.*?\;[\r\n]+/is';
    
    // Remove all CREATE TABLE statements
    $cleanedSqlContent = preg_replace($pattern, '', $sqlContent);
    
    // Write the cleaned SQL to the output file
    file_put_contents($outputFile, $cleanedSqlContent);
    
    echo "Table schema code removed and saved to $outputFile\n";
}

$path = dirname(__FILE__) ."/";

// Example usage
$inputFile = $path . 'konsulta_corei7.sql';   // Replace with your input SQL file
$outputFile = $path . 'konsulta_corei7-new.sql'; // Replace with your desired output file name

removeTableSchemas($inputFile, $outputFile);
