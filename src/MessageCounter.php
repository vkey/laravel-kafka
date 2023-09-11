<?php

namespace Junges\Kafka;

class MessageCounter
{
    private int $maxMessages;
    private int $messageCount = 0;

    public function __construct(int $maxMessages)
    {
        $this->maxMessages = $maxMessages;
    }

    public function add(): self
    {
        $this->messageCount++;

        return $this;
    }

    public function messagesCounted(): int
    {
        return $this->messageCount;
    }

    public function maxMessagesLimitReached(): bool
    {
        return $this->maxMessages === $this->messageCount;
    }
}
