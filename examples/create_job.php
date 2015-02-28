<?php
require_once('../class/php-nodilex-transcode.class.php');

$client = new Nodilex_Transcode('my_token_api');
$output = $client->jobs_create(array(
	'url' => 'http://example.com/my_video.mkv',
	'extension' => 'm3u8',
	'height' => 720,
	'width' => 1280,
));
// Check the documentation to know all possible params

if($output->status == 'OK') $id_job = $output->result->id;

$output = $client->jobs_info($id_job);
if($output->status == 'OK') {
	$download_url = $output->result->download_url;
	$length_seconds = $output->result->length_seconds;
	$progress = $output->result->progress;
	$time_remaining = $output->result->time_remaining;
}
// Check the documentation to know all outputs informations

echo $download_url;
?>