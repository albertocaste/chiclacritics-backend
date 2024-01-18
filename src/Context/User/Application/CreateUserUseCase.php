<?php

declare(strict_types=1);

namespace Src\Context\User\Application;

use DateTime;
use Src\Context\User\Domain\Contracts\UserRepositoryContract;
use Src\Context\User\Domain\User;
use Src\Context\User\Domain\ValueObjects\UserEmail;
use Src\Context\User\Domain\ValueObjects\UserEmailVerifiedDate;
use Src\Context\User\Domain\ValueObjects\UserName;
use Src\Context\User\Domain\ValueObjects\UserPassword;
use Src\Context\User\Domain\ValueObjects\UserRememberToken;

final class CreateUserUseCase
{
    private $repository;

    public function __construct(UserRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(
        string $userName,
        string $userEmail,
        ?DateTime $userEmailVerifiedDate,
        string $userPassword,
        ?string $userRememberToken
    ): void
    {
        $name = new UserName($userName);
        $email = new UserEmail($userEmail);
        $emailVerifiedDate = new UserEmailVerifiedDate($userEmailVerifiedDate);
        $password = new UserPassword($userPassword);
        $rememberToken = new UserRememberToken($userRememberToken);

        $user = User::create($name, $email, $emailVerifiedDate, $password, $rememberToken);

        $this->repository->save($user);
    }
}