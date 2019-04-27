<?php
/**
 * Copyright 2019 The WildPHP Team
 *
 * You should have received a copy of the MIT license with the project.
 * See the LICENSE file for more information.
 */
declare(strict_types=1);

namespace WildPHP\Authenticator;

class BasePermission implements PermissionInterface
{
    /**
     * @var string
     */
    protected $identifier = '';

    /**
     * @var string
     */
    protected $friendlyString = '';

    /**
     * BasePermission constructor.
     * @param string $identifier
     * @param string $friendlyString
     */
    public function __construct(string $identifier, string $friendlyString = '')
    {
        $this->identifier = $identifier;
        $this->friendlyString = $friendlyString;
    }


    /**
     * @return string
     */
    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    /**
     * @return string
     */
    public function getFriendlyString(): string
    {
        return $this->friendlyString;
    }
}
