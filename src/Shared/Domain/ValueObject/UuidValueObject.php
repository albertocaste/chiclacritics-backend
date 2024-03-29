<?php

declare(strict_types=1);

namespace Src\Shared\Domain\ValueObject;

use InvalidArgumentException;
use Ramsey\Uuid\Uuid as RamseyUuid;

class UuidValueObject
{
    public function __construct(public readonly string $value)
    {
        $this->assertIsValidUuid($value);
    }

    public static function random()
    {
        return new static(RamseyUuid::uuid4()->toString());
    }

    public static function fromValue(string $value)
    {
        return new static($value);
    }

    public function equals(UuidValueObject $other): bool
    {
        return $this->value === $other->value;
    }

    private function assertIsValidUuid(string $id): void
    {
        if (!RamseyUuid::isValid($id)) {
            throw new InvalidArgumentException(sprintf('`<%s>` does not allow the value `<%s>`.', static::class, $id));
        }
    }
}