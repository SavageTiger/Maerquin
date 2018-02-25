<?php

namespace MaerquinBundle\Model;

use FOS\UserBundle\Model\GroupInterface;

interface UserInterface
{
    /**
     * {@inheritdoc}
     */
    public function addRole($role);

    /**
     * {@inheritdoc}
     */
    public function serialize();

    /**
     * {@inheritdoc}
     */
    public function unserialize($serialized);

    /**
     * {@inheritdoc}
     */
    public function eraseCredentials();

    /**
     * {@inheritdoc}
     */
    public function getId();

    /**
     * {@inheritdoc}
     */
    public function getUsername();

    /**
     * {@inheritdoc}
     */
    public function getUsernameCanonical();

    /**
     * {@inheritdoc}
     */
    public function getSalt();

    /**
     * {@inheritdoc}
     */
    public function getEmail();

    /**
     * {@inheritdoc}
     */
    public function getEmailCanonical();

    /**
     * {@inheritdoc}
     */
    public function getPassword();

    /**
     * {@inheritdoc}
     */
    public function getPlainPassword();

    /**
     * {@inheritdoc}
     */
    public function getLastLogin();

    /**
     * {@inheritdoc}
     */
    public function getConfirmationToken();

    /**
     * {@inheritdoc}
     */
    public function getRoles();

    /**
     * {@inheritdoc}
     */
    public function hasRole($role);

    /**
     * {@inheritdoc}
     */
    public function isAccountNonExpired();

    /**
     * {@inheritdoc}
     */
    public function isAccountNonLocked();

    /**
     * {@inheritdoc}
     */
    public function isCredentialsNonExpired(); public function isEnabled();

    /**
     * {@inheritdoc}
     */
    public function isSuperAdmin();

    /**
     * {@inheritdoc}
     */
    public function removeRole($role);

    /**
     * {@inheritdoc}
     */
    public function setUsername($username);

    /**
     * {@inheritdoc}
     */
    public function setUsernameCanonical($usernameCanonical);

    /**
     * {@inheritdoc}
     */
    public function setSalt($salt);

    /**
     * {@inheritdoc}
     */
    public function setEmail($email);

    /**
     * {@inheritdoc}
     */
    public function setEmailCanonical($emailCanonical);

    /**
     * {@inheritdoc}
     */
    public function setEnabled($boolean);

    /**
     * {@inheritdoc}
     */
    public function setPassword($password);

    /**
     * {@inheritdoc}
     */
    public function setSuperAdmin($boolean);

    /**
     * {@inheritdoc}
     */
    public function setPlainPassword($password);

    /**
     * {@inheritdoc}
     */
    public function setLastLogin(\DateTime $time = null);

    /**
     * {@inheritdoc}
     */
    public function setConfirmationToken($confirmationToken);

    /**
     * {@inheritdoc}
     */
    public function setPasswordRequestedAt(\DateTime $date = null);

    /**
     * {@inheritdoc}
     */
    public function getPasswordRequestedAt();

    /**
     * {@inheritdoc}
     */
    public function isPasswordRequestNonExpired($ttl);

    /**
     * {@inheritdoc}
     */
    public function setRoles(array $roles);

    /**
     * {@inheritdoc}
     */
    public function getGroups();

    /**
     * {@inheritdoc}
     */
    public function getGroupNames();

    /**
     * {@inheritdoc}
     */
    public function hasGroup($name);

    /**
     * {@inheritdoc}
     */
    public function addGroup(GroupInterface $group);

    /**
     * {@inheritdoc}
     */
    public function removeGroup(GroupInterface $group);

    /**
     * Get the player
     */
    public function getPlayer();

    /**
     * Set the player
     *
     * @param Player $player
     */
    public function setPlayer(Player $player);
}