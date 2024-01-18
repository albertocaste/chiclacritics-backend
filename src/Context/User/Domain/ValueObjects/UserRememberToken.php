<?php

declare(strict_types=1);

namespace Src\Context\User\Domain\ValueObjects;

final class UserRememberToken
{
    private $value;

    public function __construct(?string $rememberToken)
    {
        $this->value = $rememberToken;
    }

    public function value(): ?string
    {
        return $this->value;
    }
}