<?php

/**
 * Created by PhpStorm.
 * User: 林松
 * Date: 2021/3/12
 * Time: 18:22
 */

namespace App\Components;

use App\Models\Role;
use Illuminate\Support\Facades\Log;
use Kafka;

class KafkaComponents
{

    /**
     * 生产者
     * @param $topic
     * @param $value
     * @param $url
     */
    public function producer($topic, $value, $url)
    {
        $config = Kafka\ProducerConfig::getInstance();
        $config->setMetadataRefreshIntervalMs(10000);
        $config->setMetadataBrokerList($url);
        $config->setBrokerVersion('1.0.0');
        $config->setRequiredAck(1);
        $config->setIsAsyn(false);
        $config->setProduceInterval(500);

        $producer = new Kafka\Producer(function () use ($value, $topic) {
            return [
                [
                    'topic' => $topic,
                    'value' => $value,
                    'key' => '',
                ]
            ];
        });

        $producer->success(function ($result) {
            var_dump($result);
        });

        $producer->error(function ($errorCode) {
            var_dump($errorCode);
        });

        $producer->send(true);
    }


    /**
     * 消费者
     * @param $group
     * @param $topics
     * @param $url
     */
    public function consumer($group, $topics, $url)
    {
        $config = Kafka\ConsumerConfig::getInstance();
        $config->setMetadataRefreshIntervalMs(10);
        $config->setMetadataBrokerList($url);
        $config->setGroupId($group);
        $config->setBrokerVersion('1.0.0');
        $config->setTopics([$topics]);
        $config->setOffsetReset('earliest');
        $consumer = new Kafka\Consumer();
        $consumer->start(function ($topic, $part, $message) {

            /**
             * doing
             */
            Role::create([
                'name' => $message['message']['value']
            ]);

            Log::info(json_encode($message));
        });
    }

}