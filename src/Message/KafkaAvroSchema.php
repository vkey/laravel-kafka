<?php

namespace Junges\Kafka\Message;

use AvroSchema;
use Junges\Kafka\Contracts\KafkaAvroSchemaRegistry;

class KafkaAvroSchema implements KafkaAvroSchemaRegistry
{
    private string $schemaName;
    private int $version = KafkaAvroSchemaRegistry::LATEST_VERSION;
    private ?AvroSchema $definition = null;
    public function __construct(string $schemaName, int $version = KafkaAvroSchemaRegistry::LATEST_VERSION, ?AvroSchema $definition = null)
    {
        $this->schemaName = $schemaName;
        $this->version = $version;
        $this->definition = $definition;
    }

    public function getName(): string
    {
        return $this->schemaName;
    }

    public function getVersion(): int
    {
        return $this->version;
    }

    public function setDefinition(AvroSchema $definition): void
    {
        $this->definition = $definition;
    }

    public function getDefinition(): ?AvroSchema
    {
        return $this->definition;
    }
}
