<?php

use App\KafkaService;

require_once 'vendor/autoload.php';

$detectorDeFraude = new KafkaService('a', 'ECOMMERCE_NEW_ORDER');
$detectorDeFraude->run('Encontrei registros aqui.');




