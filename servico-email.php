<?php

use App\KafkaService;

require_once 'vendor/autoload.php';

$detectorDeFraude = new KafkaService('b', 'ECOMMERCE_SEND_EMAIL');
$detectorDeFraude->run("Email sent.");