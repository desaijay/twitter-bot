<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

use Codebird\Codebird;

require 'vendor/autoload.php';

Codebird::setConsumerKey('ck5fDE32d5xDgiQle9y4OepKD', 'cby8cUsNNzPuEgxqHIrdH65k6DnyqSuff2n8R8qb6pd1YH2y6N');

$cb = Codebird::getInstance();

$cb->setReturnFormat(CODEBIRD_RETURNFORMAT_ARRAY);

$cb->setToken('750213735399059458-qCvPmkRh1QwmWuhOk62cGhfIO8Uw4j6', 'UHkozYDUAJla9YrdCXlG7rXwq3f9V4AqIQrY4gI3mDfmS');

$mentions = $cb->statuses_mentionsTimeline();



if(!isset($mentions[0])){
	return;
}

$tweets = [];

foreach($mentions as $index => $mention){
		if(isset($mention['id'])){
		$tweets[] = [

		'id' => $mention['id'],
		'user_screen_name' => $mention['user']['screen_name'],
		'text' => $mention['text']
		];
	}
}

$tweetsmap = array_map(function($tweet){
	return $tweet['text'];
}, $tweets);

var_dump($tweetsmap);

