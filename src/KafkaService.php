<?php

namespace App;

class KafkaService
{
    private $context;

    private $topic;

    public function __construct(string $groupId, string $topic)
    {
        $this->context = Connection::createContext($groupId);
        $this->topic = $topic;
    }

    public function run(string $mensagemDeRetorno = '')
    {
        $record = $this->context->createTopic($this->topic);

        $consumer = $this->context->createConsumer($record);

        $consumer->setCommitAsync(true);

        $this->parse($consumer, $mensagemDeRetorno);
    }

    private function parse($consumer, String $mensagemDeRetorno)
    {
        while(true){

            $mensagem = $consumer->receive();
        
            $consumer->acknowledge($mensagem);
        
            if (is_object($mensagem)) {
                echo $mensagemDeRetorno . PHP_EOL;
        
                echo $mensagem->getKey() . PHP_EOL ;
                echo $mensagem->getBody() . PHP_EOL ;
                echo $mensagem->getPartition() . PHP_EOL;
            }
        }
    }
}