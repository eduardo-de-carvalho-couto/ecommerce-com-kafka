<?php

namespace App;

class KafkaDispatcher
{
    private $context;

    public function __construct()
    {
        $this->context = Connection::createContext();
    }

    public function send(String $topic, String $key, String $value)
    {
        $value = $this->context->createMessage($value);
        $record = $this->context->createTopic($topic);
        $record->setKey($key);

        $this->context->createProducer()->send($record, $value);
    }
}