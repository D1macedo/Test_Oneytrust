<?php
/**
 * @function getDistance()
 * calcul de distance entre deux addresses
 *
 * @params
 * $addressFrom - Point de départ
 * $addressTo - Point de retour
 *
 */
function getDistance($addressFrom, $addressTo){
    // Google API key
    $apiKey = 'AIzaSyA-RUJfJ51BD6Ohs_qEVomyTcIJaC3om78';

    // Changement du format des adresses
    $formattedAddFrom    = str_replace(' ', '+', $addressFrom);
    $formattedAddTo     = str_replace(' ', '+', $addressTo);

    // Geocoding API du point de départ
    $geocodeFrom = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddFrom.'&sensor=false&key='.$apiKey);
    $outputFrom = json_decode($geocodeFrom);

    // Geocoding API rdu point de retour
    $geocodeTo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddTo.'&sensor=false&key='.$apiKey);
    $outputTo = json_decode($geocodeTo);

    // on récupère la latitude et la longitude de geotada
    $latitudeFrom    = $outputFrom->results[0]->geometry->location->lat;
    $longitudeFrom    = $outputFrom->results[0]->geometry->location->lng;
    $latitudeTo        = $outputTo->results[0]->geometry->location->lat;
    $longitudeTo    = $outputTo->results[0]->geometry->location->lng;

    // Calcul de distance entre latitude et longitude
    $theta    = $longitudeFrom - $longitudeTo;
    $dist    = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
    $dist    = acos($dist);
    $dist    = rad2deg($dist);
    $miles    = $dist * 60 * 1.1515;

    // On convertit en km et on renvoie la distance
    return round($miles * 1.609344, 2).' km';

}
?>
