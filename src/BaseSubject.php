<?php
/**
 * Copyright 2019 The WildPHP Team
 *
 * You should have received a copy of the MIT license with the project.
 * See the LICENSE file for more information.
 */
declare(strict_types=1);

namespace WildPHP\Authenticator;

use ValidationClosures\Types;
use Yoshi2889\Collections\Collection;

/**
 * Class BaseSubject
 * @package WildPHP\Authenticator
 */
class BaseSubject implements SubjectInterface
{
    protected $identifier = '';

    /**
     * @var Collection
     */
    protected $roles;

    /**
     * BaseSubject constructor.
     * @param string $identifier
     * @param array $initialRoles
     */
    public function __construct(string $identifier, array $initialRoles = [])
    {
        $this->roles = new Collection(Types::instanceof(RoleInterface::class), $initialRoles);
        $this->identifier = $identifier;
    }


    /**
     * @return string
     */
    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    /**
     * @param RoleInterface $role
     * @return bool
     */
    public function hasRole(RoleInterface $role): bool
    {
        return $this->roles->contains($role);
    }

    /**
     * @return Collection
     */
    public function getRoleCollection(): Collection
    {
        return $this->roles;
    }

    /**
     * @return array
     */
    public function getRolesArray(): array
    {
        return $this->roles->getArrayCopy();
    }
}
