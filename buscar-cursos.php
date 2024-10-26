<?php
require 'vendor/autoload.php';

use Jessicarolyne\BuscadorDeCursos\Buscador;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client(['base_uri' => 'https://www.alura.com.br/']);
$crawler =  new Crawler();
$Buscador = new Buscador($client, $crawler);
$cursos = $Buscador->buscar(url: '/cursos-online-programacao/php');

foreach ($cursos as $curso) {
  echo $curso . PHP_EOL;
}