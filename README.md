# Tor with CURL - PHP Scraper

[![N|Solid](http://oi68.tinypic.com/148zvx3.jpg)](https://nodesource.com/products/nsolid)

[![Build Status](https://travis-ci.org/joemccann/dillinger.svg?branch=master)](https://travis-ci.org/joemccann/dillinger)

PHP tor + curl + simple html parser api to securely make any HTTP GET/POST requests or scrape websites.

  - Protected from webcrawler detectors
  - fully supported popular web-scraper SHP
  - Created for making GET/POST requests securely

### Requirements

- PHP 5.3 or higher
- cURL
- Simple Html Parser

### Installation

Just download api.php && simple_html_parser.php class in your project folder and start using this powerful API for making HTTP GET/POST requests or scraping websites securely.

### Example of GET request

```php
require 'simple_html_parser.php'; // include a simple-html-parser class 
require 'api.php';  // include a api class 
$api = new Api(); // initialized api class
echo $api->getApiResponse('http://example.com'); // if 200 code return results else 404 code return '404'
```

### Example of Scraping web-pages

```php
require 'simple_html_parser.php'; // include a simple-html-parser class 
require 'api.php';  // include a api class 
$api = new Api(); // initialized api class
$results = $api->getApiResponse('http://example.com'); // if 200 code return results else 404 code return '404'
echo $results->find('title', 0)->innertext; // scrape title from results of request using simple-html-parser
```

### Available methods
`getApiResponse(<string>, <array>)`

```php
getApiResponse( 'http://example.com' ); // for making simple GET HTTP requests
getApiResponse( 'http://example.com', 
    array( 'id' => 'somevalue', 'price' => 'somevalue'));  // for making simple POST HTTP requests
```

License
----

MIT

[//]: # (These are reference links used in the body of this note and get stripped out when the markdown processor does its job. There is no need to format nicely because it shouldn't be seen. Thanks SO - http://stackoverflow.com/questions/4823468/store-comments-in-markdown-syntax)
