<?php


declare(strict_types=1);

namespace Crell\Serde\Attributes;

use Attribute;
use Crell\AttributeUtils\SupportsScopes;
use Crell\Serde\TypeField;

#[Attribute(Attribute::TARGET_PROPERTY)]
class UnixTime implements TypeField, SupportsScopes
{
    /**
     * @param bool $milliseconds
     *   Whether the field is represented as milliseconds (true) or seconds (false) since the epoch.
     * @param string|null $timezone
     *   The timezone string, like "America/Chicago" or "UTC", to which to force the value when exporting.
     * @param array<string|null> $scopes
     */
    public function __construct(
        public readonly bool $milliseconds = false,
        public readonly ?string $timezone = null,
        protected readonly array $scopes = [null],
    ) {}

    /**
     * @return array<string|null>
     */
    public function scopes(): array
    {
        return $this->scopes;
    }

    public function acceptsType(string $type): bool
    {
        return is_a($type, \DateTimeInterface::class, true);
    }

    public function validate(mixed $value): bool
    {
        // Nothing much to do here beyond the type.
        return true;
    }
}
