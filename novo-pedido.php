<?php

use App\Connection;
use App\KafkaDispatcher;
use Ramsey\Uuid\Uuid;

require_once __DIR__. '/vendor/autoload.php';


$key = (string) Uuid::uuid4();

$dispatcher = new KafkaDispatcher();
$dispatcher->send('ECOMMERCE_NEW_ORDER', $key, "$key,12241,12315,3463634");
$dispatcher->send('ECOMMERCE_SEND_EMAIL', $key, "Thank you for you order! We are processing your order!");