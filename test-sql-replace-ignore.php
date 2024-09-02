<?php

// Function to replace 'INSERT INTO' with 'INSERT IGNORE INTO'
function replaceInsertWithIgnore($filePath) {
    // Read the contents of the SQL file
    $content = file_get_contents($filePath);

    // Replace all instances of 'INSERT INTO' with 'INSERT IGNORE INTO'
    $modifiedContent = str_replace('INSERT INTO', 'INSERT IGNORE INTO', $content);

    // Define the new file name (save in the root directory)
    $newFilePath = basename($filePath);

    // Save the modified content to a new file in the root directory
    file_put_contents($newFilePath, $modifiedContent);

    // Inform the user about the saved file
    echo "Modified file saved as $newFilePath\n";
}

// Specify the paths of the three SQL files

$file1 = 'konsulta_corei3-new.sql';
$file2 = 'konsulta_corei5-new.sql';
$file3 = 'konsulta_corei7-new.sql';

// Process each file to replace 'INSERT INTO' with 'INSERT IGNORE INTO'
replaceInsertWithIgnore($file1);
replaceInsertWithIgnore($file2);
replaceInsertWithIgnore($file3);

echo "All files have been processed and saved in the root directory.\n";

?>
