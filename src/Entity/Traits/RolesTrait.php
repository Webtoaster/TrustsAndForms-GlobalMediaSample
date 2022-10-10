<?php

declare(strict_types=1);

namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;

trait RolesTrait
{

    /**
     * @ORM\Column(
     *     name="roles",
     *     type="json",
     *     nullable=true)
     */
    private array $roles = [];

    /**
     * Add new roles to the user in the form of a string or array.
     *
     * @param array|string $newRoles
     *
     * @return void
     */
    public function addRoles(array|string $newRoles): void
    {
        $currentRoles = $this->getRoles();
        if (is_array($newRoles)) {
            $this->setRoles(array_merge($currentRoles, $newRoles));
        } else {
            $newRolesArray = array();
            $newRolesArray[] = $newRoles;
            $this->setRoles(array_merge($currentRoles, $newRolesArray));
        }
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        // Every user has to have at least at ROLE_USER
        $this->roles[] = 'ROLE_USER';
        return array_unique($this->roles);
    }

    /**
     * @param array $rolesArray
     *
     * @return void
     */
    public function setRoles(array $rolesArray): void
    {
        $rolesArray = array_flip($rolesArray);
        $rolesArray = array_change_key_case($rolesArray, CASE_UPPER);
        $rolesArray = array_flip($rolesArray);

        // Then reindex the array into a unique array
        $this->roles = array_values(
            array_unique(
                $rolesArray
            )
        );
    }

    /**
     * Remove roles from a user in the form of a string or array.
     *
     * @param array|string $rolesToRemove
     *
     * @return void
     */
    public function removeRoles(array|string $rolesToRemove): void
    {
        $currentRoles = $this->getRoles();

        if (is_array($rolesToRemove)) {
            $this->setRoles(array_diff($currentRoles, $rolesToRemove));
        } else {
            $newRolesArray = array();
            $newRolesArray[] = strtoupper($rolesToRemove);
            $this->setRoles(array_diff($currentRoles, $newRolesArray));
        }
    }
}