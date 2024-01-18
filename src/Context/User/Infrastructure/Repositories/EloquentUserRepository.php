<?php

declare(strict_types=1);

namespace Src\Context\User\Infrastructure\Repositories;

use App\Models\User as EloquentUserModel;
use Src\Context\User\Domain\Contracts\UserRepositoryContract;
use Src\Context\User\Domain\User;
use Src\Context\User\Domain\ValueObjects\UserEmail;
use Src\Context\User\Domain\ValueObjects\UserEmailVerifiedDate;
use Src\Context\User\Domain\ValueObjects\UserId;
use Src\Context\User\Domain\ValueObjects\UserName;
use Src\Context\User\Domain\ValueObjects\UserPassword;
use Src\Context\User\Domain\ValueObjects\UserRememberToken;

final class EloquentUserRepository implements UserRepositoryContract
{
    private $eloquentUserModel;

    public function __construct()
    {
        $this->eloquentUserModel = new EloquentUserModel;
    }

    public function find(UserId $id): ?User
    {
        $user = $this->eloquentUserModel->findOrFail($id->value());

        // Return Domain User model
        return new User(
            new UserName($user->name),
            new UserEmail($user->email),
            new UserEmailVerifiedDate($user->email_verified_at),
            new UserPassword($user->password),
            new UserRememberToken($user->remember_token)
        );
    }

    public function findByCriteria(UserName $name, UserEmail $email): ?User
    {
        $user = $this->eloquentUserModel
            ->where('name', $name->value())
            ->where('email', $email->value())
            ->firstOrFail();

        // Return Domain User model
        return new User(
            new UserName($user->name),
            new UserEmail($user->email),
            new UserEmailVerifiedDate($user->email_verified_at),
            new UserPassword($user->password),
            new UserRememberToken($user->remember_token)
        );
    }

    public function save(User $user): void
    {
        $newUser = $this->eloquentUserModel;

        $data = [
            'name'              => $user->name()->value(),
            'email'             => $user->email()->value(),
            'email_verified_at' => $user->emailVerifiedDate()->value(),
            'password'          => $user->password()->value(),
            'remember_token'    => $user->rememberToken()->value(),
        ];

        $newUser->create($data);
    }

    public function update(UserId $id, User $user): void
    {
        $userToUpdate = $this->eloquentUserModel;

        $data = [
            'name'  => $user->name()->value(),
            'email' => $user->email()->value(),
        ];

        $userToUpdate
            ->findOrFail($id->value())
            ->update($data);
    }

    public function delete(UserId $id): void
    {
        $this->eloquentUserModel
            ->findOrFail($id->value())
            ->delete();
    }
}