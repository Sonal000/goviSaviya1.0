
<?php

function maps($address){

    echo "<div class='maps_container'>

    <iframe
    width='100%'
    height='100%'
    style='border:0'    
    loading='lazy'
    allowfullscreen
    referrerpolicy='no-referrer-when-downgrade'
    src='https://www.google.com/maps/embed/v1/place?key=". GOOGLEAPI . "&q=" . urlencode($address) .",SL '>
</iframe>

<div>";
    return;
    

}


function getDistancefee($origin, $destination) {

    if (!$connected = @fsockopen("www.google.com", 80)) {
        // Handle the case when there's no internet connection
        return false;
    }
    // fclose($connected);

 

    // Google Maps Distance Matrix API endpoint
    $endpoint = "https://maps.googleapis.com/maps/api/distancematrix/json";
    
    // Parameters for the API request
    $params = array(
        'origins' => $origin,
        'destinations' => $destination,
        'key' => GOOGLEAPI 
    );


    try {
    
    // Construct the API request URL
    $url = $endpoint . '?' . http_build_query($params);

    // Perform the API request
    $response = file_get_contents($url);

    
    // Parse the JSON response
    $data = json_decode($response, true);

    // Check if the response is valid and contains distance information
    if ($data && isset($data['rows'][0]['elements'][0]['distance'])) {
        // Extract the distance value from the response
        $distance = $data['rows'][0]['elements'][0]['distance']['value'];

        // Convert distance from meters to kilometers
        $distance_in_km = $distance / 1000;

        return round($distance_in_km*80);
    } else {
        return false; // Distance could not be calculated
    }

} catch (Exception $e) {
    // Handle exceptions that may occur during the API request
    return false;
}
}
function getDistance($origin, $destination) {

    if (!$connected = @fsockopen("www.google.com", 80)) {
        // Handle the case when there's no internet connection
        return "Unable to connect to the internet!";
    }
    // fclose($connected);



    // Google Maps Distance Matrix API endpoint
    $endpoint = "https://maps.googleapis.com/maps/api/distancematrix/json";
    
    // Parameters for the API request
    $params = array(
        'origins' => $origin,
        'destinations' => $destination,
        'key' => GOOGLEAPI // Replace GOOGLEAPI with your actual API key
    );


    try {
    
    // Construct the API request URL
    $url = $endpoint . '?' . http_build_query($params);

    // Perform the API request
    $response = file_get_contents($url);

    
    // Parse the JSON response
    $data = json_decode($response, true);

    // Check if the response is valid and contains distance information
    if ($data && isset($data['rows'][0]['elements'][0]['distance'])) {
        // Extract the distance value from the response
        $distance = $data['rows'][0]['elements'][0]['distance']['value'];

        // Convert distance from meters to kilometers
        $distance_in_km = $distance / 1000;

        return round($distance_in_km);
    } else {
        return false; // Distance could not be calculated
    }

} catch (Exception $e) {
    // Handle exceptions that may occur during the API request
    return false;
}
}