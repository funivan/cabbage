<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Auth\Tests\Fixtures;

use Funivan\CabbageCore\Auth\AuthComponentInterface;
use Funivan\CabbageCore\Auth\UserInterface;

/**
 * @codeCoverageIgnore
 */
class DummyAuthComponent implements AuthComponentInterface
{

    /**
     * @var UserInterface
     */
    private $user;

    /**
     * @var UserInterface
     */
    private $anonymous;


    /**
     * @param UserInterface $user
     */
    public function __construct(UserInterface $user)
    {
        $this->user = $user;
        $this->anonymous = new DummyUser(DummyUser::ANONYMOUS);
    }


    final public function authenticated(): bool
    {
        return $this->user()->uid() !== $this->anonymous->uid();
    }


    /**
     * Retrieve authenticated user
     *
     * @return UserInterface
     */
    final public function user(): UserInterface
    {
        return $this->user;
    }


    /**
     * Logout current authenticated user
     *
     * @return void
     */
    final public function logOut(): void
    {
        $this->user = $this->anonymous;
    }


    /**
     * Login specific user
     *
     * @param UserInterface $user
     * @return void
     */
    final public function logIn(UserInterface $user): void
    {
        $this->user = $user;
    }
}
