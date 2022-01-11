<?php

/*
$formatter = new Formatter();

$articleName = 'nomcam13';
$userName = 'jpablonano';

echo $formatter->getTime('2 days');
*/
?>
<script type="text/javascript">
    window.onload = getLocationConstant();

    function getLocationConstant() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(onGeoSuccess, onGeoError);
        } else {
            alert("Your browser or device doesn't support Geolocation");
        }
    }

    // If we have a successful location update
    function onGeoSuccess(event) {
        //document.getElementById("Latitude").value = event.coords.latitude;
        //document.getElementById("Longitude").value = event.coords.longitude;
        document.getElementById("Position1").value = event.coords.latitude + "+" + event.coords.longitude;

        let url = 'https://api.opencagedata.com/geocode/v1/json?q=' + event.coords.latitude + '+' + event.coords.longitude + '&key=d8d023fba5ad4c6d904081ee638c0d2d&no_annotations=1&language=es';

        let xml = new XMLHttpRequest();
        xml.open('GET', url, true);
        xml.onreadystatechange = function () {
            if (xml.status == 200 && xml.readyState == 4) {
                const res = JSON.parse(xml.responseText);
                document.getElementById("data").innerHTML += JSON.stringify(res.results[0].formatted);
            }
        };
        xml.send();
    }

    // If something has gone wrong with the geolocation request
    function onGeoError(event) {
        alert("Error code " + event.code + ". " + event.message);
    }
</script>

<h1 id="data">Perico: </h1>
<form action="{{url('/pruebas-post')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="text" id="Position1" name="position">
    <input type="submit">
</form>

<?php
/*
use App\Http\Tools\Encrypter;

$encryptor = new Encrypter();

$image_grid_size = 8;

$raster = file_get_contents("D:\OneDrive\Escritorio\prueba-hasable-nft-1.png");
$raster_length = strlen($raster);
echo "Representación imagen<br>";
for ($i = 0; $i < strlen($raster); $i++) {
echo bin2hex($raster[$i]);
}
echo "<br";

echo "<h1>Imagen: " . $raster_length . " bytes - Dividido en $image_grid_size cuadros de " . $raster_length /
    $image_grid_size . " bytes</h1><img alt='No funcionó' src='data:image/png;base64," . base64_encode($raster) . "'>";

echo "<p>" . $encryptor->encrypt($raster, "jpablonano") . "</p>";
echo "<p>" . $encryptor->encrypt(hash("sha256", $raster), "jpablonano") . "</p>";

echo "<h1>Imagen final: " . $raster_length . " bytes - Dividido en $image_grid_size cuadros de " . $raster_length /
    $image_grid_size . " bytes</h1><img alt='No funcionó' src='data:image/png;base64," . base64_encode($raster) . "'>";

*/


