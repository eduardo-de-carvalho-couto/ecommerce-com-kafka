<?php

use App\Connection;

require_once 'vendor/autoload.php';


$context = Connection::createContext('a');

$record = $context->createTopic('ECOMMERCE_NEW_ORDER');

$consumer = $context->createConsumer($record);

$consumer->setCommitAsync(true);

while(true){

    $mensagem = $consumer->receive();

    $consumer->acknowledge($mensagem);

    if (is_object($mensagem)) {
        echo "Encontrei registros aqui." . PHP_EOL;

        echo $mensagem->getKey() . PHP_EOL ;
        echo $mensagem->getBody() . PHP_EOL ;
        echo $mensagem->getPartition() . PHP_EOL;
    }
}





