<?php
/**
 * Copyright 2019 The WildPHP Team
 *
 * You should have received a copy of the MIT license with the project.
 * See the LICENSE file for more information.
 */
declare(strict_types=1);

namespace WildPHP\Authenticator;

class Authenticator
{
    /**
     * @param RoleInterface $role
     * @param PermissionInterface $permission
     * @param SubjectInterface|null $subject
     * @return bool
     */
    public static function authenticate(
        RoleInterface $role,
        PermissionInterface $permission,
        SubjectInterface $subject = null
    ): bool {
        return $role->hasPermission($permission) && ($subject !== null ? $subject->hasRole($role) : true);
    }
}
