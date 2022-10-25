<?php

use App\Connection;

require_once 'vendor/autoload.php';


$context = Connection::createContext('b');

$emailRecord = $context->createTopic('ECOMMERCE_SEND_EMAIL');

$consumer = $context->createConsumer($emailRecord);

$consumer->setCommitAsync(true);

while(true){

    $mensagem = $consumer->receive();

    $consumer->acknowledge($mensagem);

    if (is_object($mensagem)) {
        echo "Email sent." . PHP_EOL;

        echo $mensagem->getKey() . PHP_EOL ;
        echo $mensagem->getBody() . PHP_EOL ;
        echo $mensagem->getPartition() . PHP_EOL;
    }
}