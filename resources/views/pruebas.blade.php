<?php

use App\Http\Tools\Formatter;

$formatter = new Formatter();

$articleName = 'nomcam13';
$userName = 'jpablonano';

echo $formatter->getTime('2 days');

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

echo "<h1>Imagen: " . $raster_length . " bytes - Dividido en $image_grid_size cuadros de " . $raster_length / $image_grid_size . " bytes</h1><img alt='No funcionó' src='data:image/png;base64," . base64_encode($raster) . "'>";

echo "<p>" . $encryptor->encrypt($raster, "jpablonano") . "</p>";
echo "<p>" . $encryptor->encrypt(hash("sha256", $raster), "jpablonano") . "</p>";

echo "<h1>Imagen final: " . $raster_length . " bytes - Dividido en $image_grid_size cuadros de " . $raster_length / $image_grid_size . " bytes</h1><img alt='No funcionó' src='data:image/png;base64," . base64_encode($raster) . "'>";

*/


