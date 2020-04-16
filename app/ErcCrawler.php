<?php

use Spatie\Crawler\CrawlObserver;
use Psr\Http\Message\UriInterface;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;

class ErcCrawler extends CrawlObserver
{
    /**
     * @var array
     */
    private $priceList =[];

    /**
     * @param \Psr\Http\Message\UriInterface $url
     * @param \Psr\Http\Message\ResponseInterface $response
     * @param \Psr\Http\Message\UriInterface|null $foundOnUrl
     */
    public function crawled(UriInterface $url, ResponseInterface $response, ?UriInterface $foundOnUrl = null)
    {
        $path = $url->getPath();
        $doc = new \DOMDocument();
        @$doc->loadHTML($response->getBody());

        $xpath = new \DOMXPath($doc);
        $list = $xpath->query('//div[contains(@id, "CeniLista")]/table/tr');

        for($i = 0; $i < count($list); $i++) {
            $price = $list->item($i)->childNodes->item(1)->nodeValue;

            $this->priceList[] = [
                'name'      => trim($list->item($i)->childNodes->item(0)->nodeValue),
                'price'     => (float) explode(' ', $price)[0],
                'unit'      => trim(explode('/', explode(' ', $price)[1])[1]),
                'currency'  => trim(explode('/', explode(' ', $price)[1])[0])
            ];
        }
    }

    /**
     * @param \Psr\Http\Message\UriInterface $url
     * @param \GuzzleHttp\Exception\RequestException $requestException
     * @param \Psr\Http\Message\UriInterface|null $foundOnUrl
     */
    public function crawlFailed(UriInterface $url, RequestException $requestException, ?UriInterface $foundOnUrl = null)
    {
        throw $requestException;
    }

    /**
     * @return array
     */
    public function getPriceList()
    {
        return $this->priceList;
    }

}
