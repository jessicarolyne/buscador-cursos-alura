<?php

namespace Jessicarolyne\BuscadorDeCursos;

use GuzzleHttp\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;

class Buscador
{
    private $httpClient;
    private $crawler;
    public function __construct(ClientInterface $httpClient, Crawler $crawler)
    {
        $this->httpClient = $httpClient;
        $this->crawler = $crawler;
    }
    public function buscar(string $url): array
    {
        $return = $this->httpClient->request('GET', $url);

        $html = $return->getBody();
        $this->crawler->addHtmlContent($html);
        $elementsCursos = $this->crawler->filter('span.card-curso__nome');
        $cursos = [];
        foreach ($elementsCursos as $curso) :
            $cursos[] = $curso->textContent;
        endforeach;
        return $cursos;
    }
}
