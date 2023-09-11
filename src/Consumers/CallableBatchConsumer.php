<?php

namespace Junges\Kafka\Consumers;

use Closure;
use Illuminate\Support\Collection;
use Junges\Kafka\Contracts\CanConsumeBatchMessages;

class CallableBatchConsumer implements CanConsumeBatchMessages
{
    private Closure $batchHandler;
    public function __construct(Closure $batchHandler)
    {
        $this->batchHandler = $batchHandler;
    }

    /**
     * {@inheritdoc}
     */
    public function handle(Collection $collection): void
    {
        ($this->batchHandler)($collection);
    }
}
