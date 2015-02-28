# Nodilex Transcode API PHP #

## Description ##
[Cloud Video Encoding/Transcoding Software as a Service](https://www.nodilex.com/product/transcoding/)

## Prerequisites ##
* [Nodilex account](https://www.nodilex.com)
* [Token API](https://www.nodilex.com/manager/transcoding/)
* [PHP](http://www.php.net/)
* This PHP class
 
## Developer Documentation ##
https://www.nodilex.com/fr/doc/transcoding
 
 
## Basic Example (Create Job) ##
See the examples/ directory for examples of the key client features.
```PHP
<?php
require_once('class/php-nodilex-transcode.class.php');

$client = new Nodilex_Transcode('my_token_api');
$output = $client->jobs_create(array(
	'url' => 'http://example.com/myvideo.mkv',
	'extension' => 'm3u8',
	'height' => 720,
	'width' => 1280,
	'bitrate' => 2400,
));
// Check the documentation to know all possible params
```