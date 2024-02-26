<?

$file = fopen("LK.txt", "r");

// Initialize an empty array to store data
$data = array();

// Read each line from the file
while (($line = fgets($file)) !== false) {
    // Split the line by tabs
    $fields = explode("\t", $line);

    // Create an associative array for each line
    $entry = array(
        "country_code" => $fields[0],
        "postal_code" => $fields[1],
        "place_name" => $fields[2],
        "admin_name1" => $fields[3],
        "admin_code1" => $fields[4],
        "admin_name2" => $fields[5],
        "admin_code2" => $fields[6],
        "admin_name3" => $fields[7],
        "admin_code3" => $fields[8],
        "latitude" => $fields[9],
        "longitude" => $fields[10],
        "accuracy" => $fields[11]
    );

    // Push the associative array into the data array
    $data[] = $entry;
}

// Close the file
fclose($file);

// Convert the PHP array to a JSON string
$jsonString = json_encode($data);

// Convert the JSON string to a PHP object
$phpObject = json_decode($jsonString);

// Print the PHP object
print_r($phpObject);
var_dump($phpObject);


?>