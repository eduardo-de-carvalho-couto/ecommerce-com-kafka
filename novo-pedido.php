<?php

use App\Connection;
use Ramsey\Uuid\Uuid;

require_once __DIR__. '/vendor/autoload.php';


$context = Connection::createContext();

$key = Uuid::uuid4();

$value = $context->createMessage('12241,12315,3463634');
$record = $context->createTopic('ECOMMERCE_NEW_ORDER');
$record->setKey($key . "12241,12315,3463634");

$email = $context->createMessage("Thank you for you order! We are processing your order!");
$emailRecord = $context->createTopic('ECOMMERCE_SEND_EMAIL');
$emailRecord->setKey("$key");

$context->createProducer()->send($record, $value);
$context->createProducer()->send($emailRecord, $email);