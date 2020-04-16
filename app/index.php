<?php

header('Access-Control-Allow-Origin: *');
header("Content-type: application/json; charset=utf-8");

use Spatie\Crawler\Crawler;
use GuzzleHttp\Exception\RequestException;

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/ErcCrawler.php';

// Crawler URL (en or mk)
$url = isset($_GET['language']) && $_GET['language'] === 'en' ? 'https://www.erc.org.mk/Default_en.aspx' : 'https://www.erc.org.mk/';

// Init crawler
$ercCrawler = new ErcCrawler();

try{
    Crawler::create()
        ->setCrawlObserver($ercCrawler)
        ->setMaximumCrawlCount(1)
        ->ignoreRobots() //github doesnt like scrapers...
        ->startCrawling($url);

    echo json_encode(['success' => true, 'results' => $ercCrawler->getPriceList()], JSON_UNESCAPED_UNICODE);
}catch (RequestException $exception){
    echo json_encode(['success' => true, 'message' => $exception->getMessage()], JSON_UNESCAPED_UNICODE);
}

