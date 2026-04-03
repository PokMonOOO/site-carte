<?php


require '../vendor/autoload.php';
use GuzzleHttp\Client;


$client = new Client(['base_uri' => 'https://api.openweathermap.org']);

$apiKey = 'aa08f06fab3f4c4ead05d17a4505a6db';

$city = $_GET['city'] ?? 'Paris'; //Parametre par defaut "??"

try { 
    $response = $client->request('GET', '/data/2.5/weather', [
    'query' => [
        'q' => $city,
        'appid' => $apiKey,
        'units' => 'metric',
        'lang' => 'fr'
        ]
        ]);

$data = json_decode($response->getBody(), true);
header('Content-Type: application/json');
echo json_encode($data);
exit;
} catch(\Exception $e) {
    header('Content-Type: application/json', true, 500);
    echo "Erreur : " . $e->getMessage();
    exit;
}

?>