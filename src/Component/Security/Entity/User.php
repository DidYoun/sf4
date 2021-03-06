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
    protected $plainPassword;

    /** @var string */
    protected $password;

    /** @var string */
    protected $salt;

    /** @var bool */
    protected $isActive;

    /** @var string [] */
    protected $roles;

    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->roles    = new ArrayCollection(['ROLE_USER']);
        $this->isActive = true;
    }

    /** @return int */
    public function getId(): int
    {
        return $this->id;
    }

    /** @return string */
    public function getUsername() : ?string
    {
        return $this->username;
    }

    /** @param string $username */
    public function setUsername(?string $username)
    {
        $this->username = $username;
    }

    /**  @return string */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /** @param string $email */
    public function setEmail(?string $email)
    {
        $this->email = $email;
    }

    /** @return string */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /** @param string $firstName */
    public function setFirstName(?string $firstName)
    {
        $this->firstName = $firstName;
    }

    /** @return string */
    public function getLastName() : ?string
    {
        return $this->lastName;
    }

    /**  @param string $lastName */
    public function setLastName(?string $lastName)
    {
        $this->lastName = $lastName;
    }

    /** @return array */
    public function getRoles()
    {
        $roles = [];

        foreach ($this->roles as $role) {
            $roles[] = $role;
        }

        return $roles;
    }

    /**  @param array $roles */
    public function setRoles(?array $roles)
    {
        $this->roles = $roles;
    }

    /**  @param string $role */
    public function addRole(?string $role)
    {
        if (!$this->roles->contains($role)) {
            $this->roles->add($role);
        }
    }

    /** @return string */
    public function getPlainPassword() : ?string
    {
        return $this->plainPassword;
    }

    /** @param string $plainPassword */
    public function setPlainPassword(?string $plainPassword)
    {
        $this->plainPassword = $plainPassword;
        $this->password = null;
    }

    /** @return string */
    public function getPassword() : ?string
    {
        return $this->password;
    }

    /** @param string $password */
    public function setPassword(?string $password)
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
    public function setSalt(?string $salt)
    {
        $this->salt = $salt;
    }

    public function eraseCredentials()
    {
        $this->plainPassword = null;
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

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            $this->isActive,
            $this->roles
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            $this->isActive,
            $this->roles
            ) = unserialize($serialized);
    }
}