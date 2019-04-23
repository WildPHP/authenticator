<?php
/**
 * Copyright 2019 The WildPHP Team
 *
 * You should have received a copy of the MIT license with the project.
 * See the LICENSE file for more information.
 */
declare(strict_types=1);

namespace WildPHP\Authenticator;

interface RoleInterface
{
    /**
     * @return string
     */
    public function getIdentifier(): string;

    /**
     * @param PermissionInterface $permission
     * @return bool
     */
    public function hasPermission(PermissionInterface $permission): bool;

    /**
     * @return PermissionInterface[]
     */
    public function getPermissions(): array;

    /**
     * @return array
     */
    public function toArray(): array;
}
