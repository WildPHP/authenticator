<?php
/**
 * Copyright 2019 The WildPHP Team
 *
 * You should have received a copy of the MIT license with the project.
 * See the LICENSE file for more information.
 */
declare(strict_types=1);

namespace WildPHP\Authenticator;

use Yoshi2889\Collections\Collection;

interface SubjectInterface
{
    /**
     * @return string
     */
    public function getIdentifier(): string;

    /**
     * @param RoleInterface $role
     * @return bool
     */
    public function hasRole(RoleInterface $role): bool;

    /**
     * @return Collection
     */
    public function getRoleCollection(): Collection;

    /**
     * @return array
     */
    public function getRolesArray(): array;
}
