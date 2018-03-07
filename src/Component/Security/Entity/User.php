<?php

namespace Slab\Component\Security\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;

/**
 * Class User
 *
 * @package     Slab\Component\Security\Entity
 * @author      Didier Youn <didier.youn@gmail.com>
 * @copyright   Copyright (c) 2018 Slabprea
 */
class User implements AdvancedUserInterface, \Serializable
{

    /** @var int */
    protected $id;

    /** @var string */
    protected $username;

    /** @var string */
    protected $email;

    /** @var string */
    protected $firstName;

    /** @var string */
    protected $lastName;

    /** @var string */
    protected $password;

    /** @var string */
    protected $salt;

    /** @var bool */
    protected $isActive;

    /** @var [] */
    protected $roles;

    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->roles = new ArrayCollection();
    }

    /** @return int */
    public function getId(): int
    {
        return $this->id;
    }

    /** @return string */
    public function getUsername() : string
    {
        return $this->username;
    }

    /** @param string $username */
    public function setUsername(string $username) : void
    {
        $this->username = $username;
    }

    /**  @return string */
    public function getEmail(): string
    {
        return $this->email;
    }

    /** @param string $email */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /** @return string */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /** @param string $firstName */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /** @return string */
    public function getLastName() : ?string
    {
        return $this->lastName;
    }

    /**  @param string $lastName */
    public function setLastName(string $lastName) : void
    {
        $this->lastName = $lastName;
    }

    /** @return ArrayCollection */
    public function getRoles()
    {
        return $this->roles;
    }

    /**  @param array $roles */
    public function setRoles(array $roles): void
    {
        $this->roles = $roles;
    }

    /**  @param string $role */
    public function addRole(string $role): void
    {
        $this->roles[] = $role;
    }

    /** @return string */
    public function getPassword() : string
    {
        return $this->password;
    }

    /** @param string $password */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /** @return bool */
    public function isEnabled()
    {
        return $this->isActive;
    }

    /** @return string */
    public function getSalt() : ?string
    {
        return $this->salt;
    }

    /**  @param string $salt */
    public function setSalt(string $salt): void
    {
        $this->salt = $salt;
    }

    public function eraseCredentials()
    {
    }

    public function isAccountNonExpired()
    {
        return true;
    }

    public function isAccountNonLocked()
    {
        return true;
    }

    public function isCredentialsNonExpired()
    {
        return true;
    }

    public function serialize()
    {
        // TODO: Implement serialize() method.
    }

    public function unserialize($serialized)
    {
        // TODO: Implement unserialize() method.
    }
}