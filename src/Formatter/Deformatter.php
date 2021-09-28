<?php

declare(strict_types=1);

namespace Crell\Serde\Formatter;

use Crell\Serde\Field;
use Crell\Serde\SerdeError;

interface Deformatter
{
    public function format(): string;

    public function deserializeInitialize(string $serialized): mixed;

    public function deserializeInt(mixed $decoded, Field $field): int|SerdeError;

    public function deserializeFloat(mixed $decoded, Field $field): float|SerdeError;

    public function deserializeBool(mixed $decoded, Field $field): bool|SerdeError;

    public function deserializeString(mixed $decoded, Field $field): string|SerdeError;

    public function deserializeArray(mixed $decoded, Field $field, callable $recursor): array|SerdeError;

    public function deserializeDictionary(mixed $decoded, Field $field): array|SerdeError;

    public function deserializeFinalize(mixed $decoded): void;
}