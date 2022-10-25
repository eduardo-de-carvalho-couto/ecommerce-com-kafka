<?php

namespace App;

use Enqueue\RdKafka\RdKafkaConnectionFactory;

class Connection
{
    public static function createContext($groupId = null)
    {
        if ($groupId == null) {
            $groupId = uniqid('', true);
        }
        
        $connectionFactory = new RdKafkaConnectionFactory([
            'global' => [
                'group.id' => $groupId,
                'metadata.broker.list' => 'localhost:19092',
                'enable.auto.commit' => 'false',
            ],
            'topic' => [
                'auto.offset.reset' => 'beginning',
            ],
        ]);
        
        $context = $connectionFactory->createContext();
        
        return $context;
    }
}