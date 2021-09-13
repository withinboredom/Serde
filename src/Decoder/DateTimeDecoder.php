<?php

declare(strict_types=1);

namespace Crell\Serde\Decoder;

use Crell\Serde\AST\DateTimeValue;
use Crell\Serde\Decoder;

class DateTimeDecoder implements Decoder
{
    /**
     * @param \DateTime $value
     * @return DateTimeValue
     */
    public function decode(mixed $value): DateTimeValue
    {
        $toSave = clone($value);
        return new DateTimeValue(
            // @todo We may want to manually provide a format instead of using 'c' to skip the empty offset.
            dateTime: $toSave->setTimezone(new \DateTimeZone('UTC'))->format('c'),
            dateTimeZone: $value->getTimezone()->getName(),
            immutable: false,
        );
    }
}
