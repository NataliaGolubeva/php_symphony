<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once "lib/autoload.php";

PrintHead();
PrintJumbo( $title = "Leuke plekken in Europa" ,
                        $subtitle = "Tips voor citytrips voor vrolijke vakantiegangers!" );
PrintNavbar();
?>

<div class="container">
    <div class="row">

<?php


    //toon messages als er zijn
    $container->getMessageService()->ShowErrors();
    $container->getMessageService()->ShowInfos();

    //get data
    $data = $container->getDBManager()->GetData( "select * from images" );

$weather_data = [];
foreach ($data as $row => $value ) {
    $url = 'http://api.openweathermap.org/data/2.5/weather?q=' . $value['img_weather_location'] . '&lang=nl&units=metric&appid=1ef157782ad7c4c31320e64307062ae5';
    $restClient = new RESTclient($authentication = null);
    $restClient->CurlInit($url);
    $response = $restClient->CurlExec();
    $value['temp'] = round(json_decode($response)->main->temp);
    $value['clouds'] = json_decode($response)->weather[0]->description;
    $value['humidity'] = json_decode($response)->main->humidity;
    $weather_data[$row] = $value;
};
/*
$city_name = $data[0]["img_weather_location"];
$api_url = 'https://api.openweathermap.org/data/2.5/weather?q=London&lang=nl&units=metric&appid=1ef157782ad7c4c31320e64307062ae5';
$weather_data = json_decode(file_get_contents($api_url), true );
$clouds = $weather_data['weather'][0]['description'];
$temp = round($weather_data['main']['temp']);
$humidity = $weather_data['main']['humidity'];
echo $city_name;
echo '<br>';
echo $clouds;
echo '<br>';
echo $temp;
echo '<br>';
echo $humidity;
*/

    //get template
    $template = file_get_contents("templates/column.html");

    //merge
    $output = MergeViewWithData( $template, $weather_data );
    print $output;
?>


    </div>
</div>

</body>
</html>