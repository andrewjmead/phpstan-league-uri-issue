<?php

require __DIR__ . '/../vendor/autoload.php';

//
// All code below is copied form the readme.md example for thephpleague/uri
// It runs fine, but PHPStan doesn't like something about how it's set up
//

use League\Uri\UriTemplate;

$template         = 'https://api.twitter.com:443/{version}/search/{term:1}/{term}/{?q*,limit}#title';
$defaultVariables = [ 'version' => '1.1' ];
$params           = [
    'term'  => 'john',
    'q'     => [ 'a', 'b' ],
    'limit' => '10',
];

$uriTemplate = new UriTemplate( $template, $defaultVariables );
$uri         = $uriTemplate->expand( $params );
// $uri is a League\Uri\Uri object

echo $uri->getScheme();    //displays "https"
echo $uri->getAuthority(); //displays "api.twitter.com:443"
echo $uri->getPath();      //displays "/1.1/search/j/john/"
echo $uri->getQuery();     //displays "q=a&q=b&limit=10"
echo $uri->getFragment();  //displays "title"
echo $uri;
//displays "https://api.twitter.com:443/1.1/search/j/john/?q=a&q=b&limit=10#title"
echo json_encode( $uri );
//displays "https:\/\/api.twitter.com:443\/1.1\/search\/j\/john\/?q=a&q=b&limit=10#title"