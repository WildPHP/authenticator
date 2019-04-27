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

class BaseRole implements RoleInterface
{
    /**
     * @var string
     */
    protected $identifier = '';

    /**
     * @var Collection
     */
    protected $permissions;

    /**
     * BaseRole constructor.
     * @param string $identifier
     * @param array $initialPermissions
     */
    public function __construct(string $identifier, array $initialPermissions = [])
    {
        $this->identifier = $identifier;
        $this->permissions = new Collection(Types::instanceof(PermissionInterface::class), $initialPermissions);
    }


    /**
     * @return string
     */
    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    /**
     * @param PermissionInterface $permission
     * @return bool
     */
    public function hasPermission(PermissionInterface $permission): bool
    {
        return $this->permissions->contains($permission);
    }

    /**
     * @return Collection
     */
    public function getPermissionCollection(): Collection
    {
        return $this->permissions;
    }

    /**
     * @return array
     */
    public function getPermissionArray(): array
    {
        return $this->permissions->getArrayCopy();
    }
}
