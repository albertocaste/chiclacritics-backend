<?php

declare(strict_types=1);

namespace Src\Context\User\Domain\Contracts;

use Src\Context\User\Domain\User;
use Src\Context\User\Domain\ValueObjects\UserEmail;
use Src\Context\User\Domain\ValueObjects\UserEmailVerifiedDate;
use Src\Context\User\Domain\ValueObjects\UserId;
use Src\Context\User\Domain\ValueObjects\UserName;

interface UserRepositoryContract
{
    public function find(UserId $id): ?User;

    public function findByCriteria(UserName $userName, UserEmail $userEmail): ?User;

    public function save(User $user): void;

    public function update(UserId $userId, User $user): void;

    public function delete(UserId $id): void;
}