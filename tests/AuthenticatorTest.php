<?php
/**
 * Copyright 2019 The WildPHP Team
 *
 * You should have received a copy of the MIT license with the project.
 * See the LICENSE file for more information.
 */

use PHPUnit\Framework\TestCase;
use WildPHP\Authenticator\Authenticator;
use WildPHP\Authenticator\BasePermission;
use WildPHP\Authenticator\BaseRole;
use WildPHP\Authenticator\BaseSubject;
use Yoshi2889\Collections\Collection;

class AuthenticatorTest extends TestCase
{
    public function testAuthenticate()
    {
        $permission = new BasePermission('permission');
        $this->assertEquals('permission', $permission->getIdentifier());
        $this->assertEquals('', $permission->getFriendlyString());

        $role = new BaseRole('role', [$permission]);
        $this->assertEquals('role', $role->getIdentifier());
        $this->assertEquals([$permission], $role->getPermissionArray());
        $this->assertInstanceOf(Collection::class, $role->getPermissionCollection());
        $this->assertTrue($role->hasPermission($permission));

        $subject = new BaseSubject('subject', [$role]);
        $this->assertEquals('subject', $subject->getIdentifier());
        $this->assertEquals([$role], $subject->getRolesArray());
        $this->assertInstanceOf(Collection::class, $subject->getRoleCollection());
        $this->assertTrue($subject->hasRole($role));

        $this->assertTrue(Authenticator::authenticate($role, $permission, $subject));
        $this->assertTrue(Authenticator::authenticate($role, $permission));
    }
}
