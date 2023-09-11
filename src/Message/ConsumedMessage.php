<?php

namespace Junges\Kafka\Message;

use Junges\Kafka\AbstractMessage;
use Junges\Kafka\Contracts\KafkaConsumerMessage;

class ConsumedMessage extends AbstractMessage implements KafkaConsumerMessage
{
    protected ?string $topicName;
    protected ?int $partition;
    protected ?array $headers;
    /**
     * @var mixed
     */
    protected $body;
    /**
     * @var mixed
     */
    protected $key;
    protected ?int $offset;
    protected ?int $timestamp;
    /**
     * @param mixed $body
     * @param mixed $key
     */
    public function __construct(?string $topicName, ?int $partition, ?array $headers, $body, $key, ?int $offset, ?int $timestamp)
    {
        $this->topicName = $topicName;
        $this->partition = $partition;
        $this->headers = $headers;
        $this->body = $body;
        $this->key = $key;
        $this->offset = $offset;
        $this->timestamp = $timestamp;
        parent::__construct(
            $this->topicName,
            $this->partition,
            $this->headers,
            $this->body,
            $this->key
        );
    }
    public function getOffset(): ?int
    {
        return $this->offset;
    }

    public function getTimestamp(): ?int
    {
        return $this->timestamp;
    }
}
