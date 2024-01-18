<?php

declare(strict_types=1);

namespace Src\Context\User\Application;

use Src\Context\User\Domain\Contracts\UserRepositoryContract;
use Src\Context\User\Domain\User;
use Src\Context\User\Domain\ValueObjects\UserEmail;
use Src\Context\User\Domain\ValueObjects\UserName;

final class GetUserByCriteriaUseCase
{
    private $repository;

    public function __construct(UserRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(string $userName, string $userEmail): ?User
    {
        $name  = new UserName($userName);
        $email = new UserEmail($userEmail);

        $user = $this->repository->findByCriteria($name, $email);

        return $user;
    }
}